@extends('admin.layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ isset($cast) ? __('Edit Cast') : __('Add Cast') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ isset($cast) ? __('Edit Cast') : __('Add Cast') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ isset($cast) && $cast->exists ? route('admin.casts.update', $cast->id) : route('admin.casts.store') }}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($cast) && $cast->exists)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="type">{{ __('Type') }}</label>
                        <select name="type" class="form-control" id="type" required>
                            @foreach($types as $key => $type)
                                <option value="{{ $key }}" {{ old('type', $cast->type ?? '') === $key ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nameUa">{{ __('Name (UA)') }}</label>
                        <input type="text" name="name_ua" class="form-control" id="nameUa"
                               value="{{ old('name_ua', isset($cast) ? $cast->getTranslation('name', 'ua') : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nameEn">{{ __('Name (EN)') }}</label>
                        <input type="text" name="name_en" class="form-control" id="nameEn"
                               value="{{ old('name_en', isset($cast) ? $cast->getTranslation('name', 'en') : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="photo">{{ __('Photo') }}</label>
                        @if(isset($cast) && $cast->photo)
                            <div class="mb-2">
                                <img src="{{ Storage::url($cast->photo) }}" alt="Photo" class="img-thumbnail" style="max-width: 150px;">
                            </div>
                        @endif
                        <input type="file" name="photo" class="form-control-file" id="photo">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="{{ isset($cast) && $cast->exists ? __('Update') : __('Add') }}">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
