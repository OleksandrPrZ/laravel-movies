<?php
namespace App\Http\Controllers\Admin\Cast;

use App\Http\Controllers\Controller;
use App\Models\Cast\Cast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $casts = Cast::paginate(10);
        $types = Cast::TYPES;
        return view('admin.casts.index', compact('casts','types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cast = new Cast();
        $types = Cast::TYPES;
        return view('admin.casts.create', compact('cast','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'type' => 'required|string',
            'name_ua' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'photo' => 'nullable|image'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('cast_photos', 'public');
        }

        $cast = new Cast();
        $cast->type = $data['type'];
        $cast->photo = $data['photo'] ?? null;

        $cast->setTranslation('name', 'ua', $data['name_ua']);
        $cast->setTranslation('name', 'en', $data['name_en']);
        $cast->save();

        return redirect()->route('admin.casts.index')->with('success', 'Cast added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $cast = Cast::findOrFail($id);
        return view('admin.casts.show', compact('cast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $cast = Cast::findOrFail($id);
        $types = Cast::TYPES;

        return view('admin.casts.create', compact('cast', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $cast = Cast::findOrFail($id);

        $data = $request->validate([
            'type' => 'required|string',
            'name_ua' => 'required|string',
            'name_en' => 'required|string',
            'photo' => 'nullable|image'
        ]);

        if ($request->hasFile('photo')) {
            if ($cast->photo) {
                Storage::disk('public')->delete($cast->photo); // Видаляємо старе фото
            }
            $data['photo'] = $request->file('photo')->store('cast_photos', 'public');
        }

        $cast->setTranslation('name', 'ua', $data['name_ua']);
        $cast->setTranslation('name', 'en', $data['name_en']);

        $cast->update($data);

        return redirect()->route('admin.casts.index')->with('success', 'Cast updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $cast = Cast::findOrFail($id);

        if ($cast->photo) {
            Storage::disk('public')->delete($cast->photo); // Видаляємо фото, якщо воно існує
        }

        $cast->delete();
        return redirect()->route('admin.casts.index')->with('success', 'Cast deleted successfully');
    }
}
