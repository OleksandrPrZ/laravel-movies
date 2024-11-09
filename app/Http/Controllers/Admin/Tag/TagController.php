<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tag = new Tag();
        return view('admin.tags.create',compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ua' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $tag = new Tag();
        $tag->setTranslation('name', 'ua', $request->name_ua);
        $tag->setTranslation('name', 'en', $request->name_en);
        $tag->save();

        return redirect()->route('admin.tags.index')->with('success', 'Tag created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::find($id);

        return view('admin.tags.create', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Tag $tag)
    {
        $request->validate([
            'name_ua' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $tag->setTranslation('name', 'ua', $request->name_ua);
        $tag->setTranslation('name', 'en', $request->name_en);
        $tag->save();

        return redirect()->route('admin.tags.index')->with('success', 'Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   $tag = Tag::find($id);
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('success', 'Tag deleted successfully');
    }
}
