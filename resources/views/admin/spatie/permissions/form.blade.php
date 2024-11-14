@extends('admin.layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ isset($role) ? __('Edit Permissions') : __('Add permissions') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ isset($role) ? __('Edit Permission') : __('Add Permission') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ isset($permission) && $permission->exists ? route('admin.roles.update', $permission->id) : route('admin.roles.store') }}" method="post">
                    @csrf
                    @if(isset($permission) && $permission->exists)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="name">Permissione Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $permission->name ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="guard_name">Guard Name</label>
                        <select name="guard_name" class="form-control" required>
                            <option value="web" {{ (isset($permission) && $permission->guard_name == 'web') ? 'selected' : '' }}>Web</option>
                            <option value="api" {{ (isset($role) && $permission->guard_name == 'api') ? 'selected' : '' }}>API</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="permissions">Permissions</label>
                        <select name="permissions[]" class="form-control select2" multiple="multiple" required>
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}"
                                    {{ (isset($permission) && $role->permissions->contains($permission->id)) ? 'selected' : '' }}>
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">{{ isset($role) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </section>
@endsection
