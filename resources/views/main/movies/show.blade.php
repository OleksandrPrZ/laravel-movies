@extends('main.layouts.app')

@section('title', $movie->title)

@section('content')
    <div class="container mt-4">
        <!-- Breadcrumbs -->
        <div>
            <a href="{{ route('home') }}">{{ __('Movie App') }}</a> / <span>{{ $movie->title }}</span>
        </div>

        <div class="row mt-4">
            <!-- Poster -->
            <div class="col-md-3">
                <img src="{{ $movie->poster ? asset('storage/' . $movie->poster) : asset('images/noimage.webp') }}" alt="{{ $movie->title }}" class="img-fluid">
            </div>

            <!-- Movie Information -->
            <div class="col-md-9">
                <h1>{{ $movie->title }} ({{ $movie->release_year }})</h1>
                <p>{{ $movie->description }}</p>

                <!-- Tags -->
                <div class="mb-3">
                    @foreach($movie->tags as $tag)
                        <span class="badge badge-secondary">{{ $tag->name }}</span>
                    @endforeach
                </div>

                <!-- Movie Cast Information -->
                <div class="mt-4">
                    @php
                        $locale = App::getLocale();
                    @endphp

                        <!-- Director -->
                    @php
                        $directors = $movie->movieCasts->where('type', 'director');
                    @endphp
                    @if($directors->isNotEmpty())
                        <p><strong>{{ __('Director(s)') }}:</strong>
                            @foreach($directors as $director)
                                {{ $director->getTranslation('name', $locale) }}
                            @endforeach
                        </p>
                    @endif

                    <!-- Writers -->
                    @php
                        $writers = $movie->movieCasts->where('type', 'writer');
                    @endphp
                    @if($writers->isNotEmpty())
                        <p><strong>{{ __('Writer(s)') }}:</strong>
                            @foreach($writers as $writer)
                                {{ $writer->getTranslation('name', $locale) }}
                            @endforeach
                        </p>
                    @endif

                    <!-- Stars (Actors) -->
                    @php
                        $actors = $movie->movieCasts->where('type', 'actor');
                    @endphp
                    @if($actors->isNotEmpty())
                        <p><strong>{{ __('Stars') }}:</strong>
                            @foreach($actors as $actor)
                                <img src="{{ $actor->photo ? asset('storage/' . $actor->photo) : asset('images/noimage.webp') }}" alt="{{ $actor->getTranslation('name', $locale) }}" class="rounded-circle" width="30" height="30">
                                {{ $actor->getTranslation('name', $locale) }}
                            @endforeach
                        </p>
                    @endif

                    <!-- Composer -->
                    @php
                        $composers = $movie->movieCasts->where('type', 'composer');
                    @endphp
                    @if($composers->isNotEmpty())
                        <p><strong>{{ __('Composer(s)') }}:</strong>
                            @foreach($composers as $composer)
                                {{ $composer->getTranslation('name', $locale) }}
                            @endforeach
                        </p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Screenshots and Trailer -->
        <div class="row mt-4">
            <div class="col-md-3">
                @foreach($movie->screenshots as $screenshot)
                    <img src="{{ asset('storage/' . $screenshot) }}" alt="Screenshot" class="img-fluid mb-2">
                @endforeach
            </div>

            <div class="col-md-9">
                @if($showVideo && $movie->youtube_trailer_id)
                    <iframe width="100%" height="450" src="https://www.youtube.com/embed/{{ $movie->youtube_trailer_id }}" frameborder="0" allowfullscreen></iframe>
                @else
                    <img src="{{ asset('images/no-trailer.webp') }}" class="img-fluid" alt="No Trailer Available">
                @endif
            </div>
        </div>
    </div>
@endsection
