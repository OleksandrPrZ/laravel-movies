<?php

namespace App\Http\Controllers;

use App\Models\Movie\Movie;

class MainController extends Controller
{
    public function index()
    {
        $movies = Movie::where('status', true)->paginate(8);

        return view('main.index', compact('movies'));
    }
}
