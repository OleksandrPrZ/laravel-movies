@extends('main.layouts.app')
@section('title', 'Home')
@section('content')
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-3 mb-4">
                <a href="{{ route('movies.show', ['slug' => $movie->slug]) }}" class="text-decoration-none text-dark">
                    <div class="card movie-card">
                        <img src="{{ $movie->poster ? Storage::url($movie->poster) : asset('images/noimage.webp') }}"
                             class="card-img-top"
                             alt="{{ $movie->title }}">
                        <div class="card-body movie-info">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ $movie->release_year }}, {{ $movie->director }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="pagination-wrapper d-flex justify-content-center">
        {{ $movies->links('pagination::bootstrap-4') }}
    </div>
@endsection
