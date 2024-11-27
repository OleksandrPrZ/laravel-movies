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
                            <p class="card-text">{{ $movie->release_year }}
                            @php
                                $directors = $movie->movieCasts->where('type', 'director');
                            @endphp

                            @if($directors->isNotEmpty())
                                <p class="card-text">
                                    {{ $directors->map(function ($director) {
                                        $locale = app()->getLocale();
                                        return $director->getTranslation('name', $locale);
                                    })->join(', ') }}
                                </p>
                            @endif
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
