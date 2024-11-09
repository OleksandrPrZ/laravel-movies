<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie\Movie;
use App\Models\Tag\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     */
    public function index(): View
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new movie.
     */
    public function create(): View
    {
        $movie = new Movie();
        $tags = Tag::all();
        return view('admin.movies.create', compact('movie','tags'));
    }

    /**
     * Store a newly created movie in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $movie = new Movie();
        $movie->status = $request->input('status');
        $movie->setTranslation('title', 'ua', $request->input('title_ua'));
        $movie->setTranslation('title', 'en', $request->input('title_en'));
        $movie->setTranslation('description', 'ua', $request->input('description_ua'));
        $movie->setTranslation('description', 'en', $request->input('description_en'));
        $movie->youtube_trailer_id = $request->input('youtube_trailer_id');
        $movie->release_year = $request->input('release_year');
        $movie->screenshots = $request->input('screenshots', []);
        $movie->save();

        $tags = $request->input('tags', []);
        $movie->tags()->sync($tags);

        return redirect()->route('admin.movies.index');
    }

    /**
     * Show the form for editing the specified movie.
     */
    public function edit(Movie $movie): View
    {
        $tags = Tag::all();
        return view('admin.movies.create', compact('movie','tags'));
    }

    /**
     * Update the specified movie in storage.
     */
    public function update(Request $request, Movie $movie): RedirectResponse
    {
        $movie->status = $request->input('status');
        $movie->setTranslation('title', 'ua', $request->input('title_ua'));
        $movie->setTranslation('title', 'en', $request->input('title_en'));
        $movie->setTranslation('description', 'ua', $request->input('description_ua'));
        $movie->setTranslation('description', 'en', $request->input('description_en'));
        $movie->youtube_trailer_id = $request->input('youtube_trailer_id');
        $movie->release_year = $request->input('release_year');
        $movie->screenshots = $request->input('screenshots', []);
        $movie->save();

        $tags = $request->input('tags', []);
        $movie->tags()->sync($tags);

        return redirect()->route('admin.movies.index');
    }

    /**
     * Remove the specified movie from storage.
     */
    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();
        return redirect()->route('admin.movies.index');
    }

    public function uploadScreenshots(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|image|max:2048' // Перевірка на тип і розмір файлу
        ]);

        if ($request->file('file')) {
            $path = $request->file('file')->store('screenshots', 'public');
            return response()->json(['path' => $path], 200);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }
}
