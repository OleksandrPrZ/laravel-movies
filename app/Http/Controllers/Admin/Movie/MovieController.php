<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Contracts\Movie\MovieRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Movie\StoreMovieRequest;
use App\Http\Requests\Movie\UpdateMovieRequest;
use App\Models\Movie\Movie;
use App\Models\Tag\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MovieController extends Controller
{
    private $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function index(): View
    {
        $movies = Movie::paginate(8);
        return view('admin.movies.index', compact('movies'));
    }

    public function create(): View
    {
        $tags = Tag::all();
        return view('admin.movies.create', ['movie' => new Movie(), 'tags' => $tags]);
    }

    public function store(StoreMovieRequest $request): RedirectResponse
    {
        $this->movieRepository->create($request->validated());
        return redirect()->route('admin.movies.index');
    }

    public function edit(Movie $movie): View
    {
        $tags = Tag::all();
        return view('admin.movies.create', compact('movie', 'tags'));
    }

    public function update(UpdateMovieRequest $request, $id): RedirectResponse
    {
        $this->movieRepository->update($id, $request->validated());
        return redirect()->route('admin.movies.index');
    }

    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();
        return redirect()->route('admin.movies.index');
    }

    public function uploadScreenshots(Request $request): JsonResponse
    {
        $request->validate(['file' => 'required|image|max:2048']);

        if ($request->file('file')) {
            $path = $request->file('file')->store('screenshots', 'public');
            return response()->json(['path' => $path], 200);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }
    public function deletePoster(Movie $movie)
    {
        if ($movie->poster) {
            \Storage::disk('public')->delete($movie->poster);
            $movie->poster = null;
            $movie->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
