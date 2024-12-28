@extends('backend.layouts.app')
@section('css')

@endsection




@section('content')

    <div class="container mt-5 pb-5 d-flex justify-content-center">
        <div class="card shadow-sm" style="width: 60%;"> <!-- Adjust the width as needed -->
            <div class="card-header bg-off-white text-white">
                <h5 class="mb-0 text-gray-800"><b>Update Password</b></h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('profile.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    @csrf

                    <!-- First field (Link) -->
                    <div class="mb-3 row align-items-center">
                        <label for="businessName" class="col-md-3 col-form-label">Profile Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="businessName" >
                        </div>
                    </div>

                    <!-- Second field (Ordering Number) -->
                    <div class="mb-3 row align-items-center">
                        <label for="businessOrder" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" name="email"  value="{{ $category->email }}" class="form-control" id="businessOrder" >
                        </div>
                    </div>

                    <div class="mb-3 row align-items-center">
                        <label for="businessName" class="col-md-3 col-form-label">Update Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password"  class="form-control" id="businessName" >
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary d-block ms-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection




@section('js')

@endsection
