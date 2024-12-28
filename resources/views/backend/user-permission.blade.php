@extends('backend.layouts.app')
@section('css')

@endsection

@section('content')

<div class="container mt-5 pb-md-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Assign Permissions to User</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.permissions.update', ['userId' => $userId]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="user">Select User</label>
                            <select name="user_id" id="user" class="form-control" onchange="location.href='{{ url('admin/user-permissions') }}/' + this.value;">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $userId ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="permissions">Permissions</label>
                            <div class="row">
                                @foreach ($permissionsList as $id => $label)
                                    <div class="col-md-2">
                                        <label>
                                            <input
                                                type="checkbox"
                                                name="permission[]"
                                                value="{{ $id }}"
                                                {{ in_array($id, $userPermissions) ? 'checked' : '' }}
                                            />
                                            {{ $label }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')


@endsection
