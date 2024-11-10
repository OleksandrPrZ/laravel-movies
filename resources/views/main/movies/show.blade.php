@extends('main.layouts.app')

@section('title', $movie->title)

@section('content')
    <div class="container mt-4">
        <!-- Breadcrumbs -->
        <div>
            <a href="{{ route('home') }}">{{__('Movie App')}}</a> / <span>{{ $movie->title }}</span>
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

{{--                <!-- Movie Details -->--}}
{{--                <p><strong>Director:</strong> {{ $movie->director }}</p>--}}
{{--                <p><strong>Writers:</strong> {{ $movie->writers }}</p>--}}
{{--                <p><strong>Stars:</strong>--}}
{{--                    @foreach($movie->stars as $star)--}}
{{--                        <img src="{{ $star->image ? asset('storage/' . $star->image) : asset('images/noimage.webp') }}" alt="{{ $star->name }}" class="rounded-circle" width="30" height="30">--}}
{{--                        {{ $star->name }}--}}
{{--                    @endforeach--}}
{{--                </p>--}}
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
