@extends('admin.layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ isset($user) ? __('Edit User') : __('Add User') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ isset($user) ? __('Edit User') : __('Add User') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ isset($user) && $user->exists ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="roles">Select Roles</label>
                        <select name="roles[]" id="roles" class="form-control select-role" multiple>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ $user->roles->contains($role) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(function () {
                $('.select-role').select2();
            })
        })
    </script>
@endsection
