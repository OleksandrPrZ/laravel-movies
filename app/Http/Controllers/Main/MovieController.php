<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Contracts\Movie\MovieRepositoryInterface;
use App\Models\Movie\Movie;
use Illuminate\View\View;

class MovieController extends Controller
{
    private MovieRepositoryInterface $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * Display the specified movie by slug.
     *
     * @param string $slug
     * @return View
     */
    public function showBySlug(string $slug): View
    {
        $movie = Movie::where('slug', $slug)->where('status', true)->firstOrFail();
        $currentDate = now();
        $showVideo = $movie->viewing_start_date <= $currentDate && $currentDate <= $movie->viewing_end_date;

        return view('main.movies.show', compact('movie', 'showVideo'));
    }
}
