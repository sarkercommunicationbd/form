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
                            <h4>Sub Admin Permission</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('permissions.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="">Permissions</label>
                                    <div class="row">
                                        @foreach ($permissionsList as $id => $label)
                                            <div class="col-md-2">
                                                <label>
                                                    <input
                                                        type="checkbox"
                                                        name="permission[]"
                                                        value="{{ $id }}"
                                                        {{ in_array($id, $rolePermissions) ? 'checked' : '' }}
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
