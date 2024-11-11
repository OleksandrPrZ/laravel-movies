@php
    use Carbon\Carbon;
@endphp
@extends('admin.layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $movie->exists ? __('Edit Movie') : __('Add Movie') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ $movie->exists ? __('Edit Movie') : __('Add Movie') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row-cols-2">
                <form action="{{ $movie->exists ? route('admin.movies.update', $movie->id) : route('admin.movies.store') }}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @if($movie->exists)
                        @method('PUT')
                    @endif

                    <!-- Status -->
                    <div class="form-group">
                        <label for="statusSwitch">Status</label>
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" name="status" class="form-control switch" id="statusSwitch" data-on-text="On" data-off-text="Hide" data-on-color="success" data-off-color="danger" value="1" {{ old('status', $movie->status ?? 1) ? 'checked' : '' }}>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Title (UA) -->
                    <div class="form-group">
                        <label for="titleUa">Title (UA)</label>
                        <input type="text" name="title_ua" class="form-control" id="titleUa" value="{{ old('title_ua', $movie->getTranslation('title', 'ua') ?? '') }}" required>
                        @error('title_ua')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Title (EN) -->
                    <div class="form-group">
                        <label for="titleEn">Title (EN)</label>
                        <input type="text" name="title_en" class="form-control" id="titleEn" value="{{ old('title_en', $movie->getTranslation('title', 'en') ?? '') }}" required>
                        @error('title_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="productSlug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="productSlug" value="{{old('slug', $movie->slug ?? '')}}" placeholder="Slug">
                        @error('slug')
                        <div class="text-danger">222{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Description (UA) -->
                    <div class="form-group">
                        <label for="descriptionUa">Description (UA)</label>
                        <textarea name="description_ua" class="form-control" id="descriptionUa" rows="3">{{ old('description_ua', $movie->getTranslation('description', 'ua') ?? '') }}</textarea>
                        @error('description_ua')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description (EN) -->
                    <div class="form-group">
                        <label for="descriptionEn">Description (EN)</label>
                        <textarea name="description_en" class="form-control" id="descriptionEn" rows="3">{{ old('description_en', $movie->getTranslation('description', 'en') ?? '') }}</textarea>
                        @error('description_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Poster -->
                    <div class="form-group">
                        <label for="poster">{{__('Poster')}}</label>

                        @if($movie->poster)
                            <div class="mb-2">
                                <img src="{{ Storage::url($movie->poster) }}" alt="Poster" class="img-thumbnail" style="max-width: 150px;">
                                <button type="button" class="btn btn-danger btn-sm mt-2" id="delete-poster">{{__('Delete')}}</button>
                            </div>

                            <input type="hidden" name="old_poster" value="{{ $movie->poster }}">
                        @endif

                        <input type="file" name="poster" class="form-control-file" id="poster">
                        @error('poster')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Screenshots Dropzone -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Загрузка скриншотов') }} (Dropzone.js)</h3>
                        </div>
                        <div class="card-body">
                            <div id="actions" class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="btn-group w-100">
                    <span class="btn btn-success fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>{{ __('Додати зображення') }}</span>
                    </span>

                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="fileupload-process w-100">
                                        <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table table-striped files" id="previews">
                                <div id="template" class="row mt-2">
                                    <div class="col-auto">
                                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                    </div>
                                    <div class="col d-flex align-items-center">
                                        <p class="mb-0">
                                            <span class="lead" data-dz-name></span>
                                            (<span data-dz-size></span>)
                                        </p>
                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex align-items-center">
                                        <div class="btn-group">
                                            <button data-dz-remove class="btn btn-danger delete">
                                                <i class="fas fa-trash"></i>
                                                <span>{{ __('Видалити') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="screenshotsInputs"></div>
                        </div>
                    </div>

                    <!-- YouTube Trailer ID -->
                    <div class="form-group">
                        <label for="youtubeTrailerId">YouTube Trailer ID</label>
                        <input type="text" name="youtube_trailer_id" class="form-control" id="youtubeTrailerId" value="{{ old('youtube_trailer_id', $movie->youtube_trailer_id ?? '') }}">
                        @error('youtube_trailer_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Release Year -->
                    <div class="form-group">
                        <label for="releaseYear">{{__('Release Year')}}</label>
                        <input type="number" name="release_year" class="form-control" id="releaseYear"
                               value="{{ old('release_year', $movie->release_year ?? '') }}"
                               min="1900" max="{{ date('Y') }}">
                        @error('release_year')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="viewingStartDate">{{ __('Viewing Start Date') }}</label>
                        <input type="datetime-local" name="viewing_start_date" class="form-control" id="viewingStartDate"
                               value="{{ $movie->viewing_start_date ? \Carbon\Carbon::parse($movie->viewing_start_date)->format('Y-m-d\TH:i') : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="viewingEndDate">{{ __('Viewing End Date') }}</label>
                        <input type="datetime-local" name="viewing_end_date" class="form-control" id="viewingEndDate"
                               value="{{ $movie->viewing_end_date ? \Carbon\Carbon::parse($movie->viewing_end_date)->format('Y-m-d\TH:i') : '' }}">
                    </div>
                    <div class="form-group">
                        <label>{{ __('Tags') }}</label>
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ isset($movie) && $movie->tags->contains($tag->id) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="{{ $movie->exists ? 'Update' : 'Add' }}">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deletePosterButton = document.getElementById('delete-poster');

            if (deletePosterButton) {
                deletePosterButton.addEventListener('click', function () {
                    if (confirm('Вы уверены, что хотите удалить постер?')) {
                        fetch('{{ route("admin.movies.deletePoster", $movie->id) }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ _method: 'DELETE' })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    deletePosterButton.parentElement.remove();
                                } else {
                                    alert('Ошибка при удалении постера');
                                }
                            })
                            .catch(error => console.error('ERROR:', error));
                    }
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(function () {
                $('.tags').select2();
            })
            $('.switch').bootstrapSwitch({
                onText: 'On',
                offText: 'Hide',
                onColor: 'success',
                offColor: 'danger'
            });

            Dropzone.autoDiscover = false;

            var previewNode = document.querySelector("#template");
            previewNode.id = "";
            var previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);

            var myDropzone = new Dropzone("form", {
                url: "{{ route('admin.movies.screenshot') }}",
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                method: "post",
                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                autoQueue: true,
                previewsContainer: "#previews",
                clickable: ".fileinput-button"
            });

            // Завантаження збережених скріншотів при редагуванні
            @if(isset($movie->screenshots) && is_array($movie->screenshots))
            @foreach($movie->screenshots as $screenshot)
            var mockFile = { name: "{{ basename($screenshot) }}", size: 12345 };
            myDropzone.emit("addedfile", mockFile);
            myDropzone.emit("thumbnail", mockFile, "/storage/{{ $screenshot }}");
            myDropzone.emit("complete", mockFile);

            $("<input>").attr({
                type: "hidden",
                name: "screenshots[]",
                value: "{{ $screenshot }}"
            }).appendTo("#screenshotsInputs");
            @endforeach
            @endif

            myDropzone.on("success", function(file, response) {
                $("<input>").attr({
                    type: "hidden",
                    name: "screenshots[]",
                    value: response.path
                }).appendTo("#screenshotsInputs");
            });

            myDropzone.on("totaluploadprogress", function(progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
            });

            myDropzone.on("queuecomplete", function(progress) {
                document.querySelector("#total-progress").style.opacity = "0";
            });
        });
    </script>

@endsection
