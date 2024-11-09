@extends('admin.layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ isset($tag) ? __('Edit Tag') : __('Add Tag') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ isset($tag) ? __('Edit Tag') : __('Add Tag') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ isset($tag) && $tag->exists ? route('admin.tags.update', $tag->id) : route('admin.tags.store') }}" method="post">
                    @csrf
                    @if(isset($tag) && $tag->exists)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="nameUa">Name (UA)</label>
                        <input type="text" name="name_ua" class="form-control" id="nameUa" value="{{ old('name_ua', $tag->getTranslation('name', 'ua') ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nameEn">Name (EN)</label>
                        <input type="text" name="name_en" class="form-control" id="nameEn" value="{{ old('name_en', $tag->getTranslation('name', 'en') ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug', $tag->slug ?? '') }}">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="{{ $tag->exists ? __('Update') : __('Add') }}">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
