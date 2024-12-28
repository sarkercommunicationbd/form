@extends('backend.layouts.app')
@section('css')

@endsection

@section('content')
    <div class="px-4">


        <div class="mb-3 d-flex justify-content-between align-items-center">

            <div>

            </div>

            <div class="d-flex" >
                <form action="{{ url('customer/export/decline') }}" method="GET">
                    <label>Export Customer Data in Excel File</label>
                    <div class="input-group mt-2">
                        <select name="type" class="form-control" required>
                            <option value="">Select Excel Format</option>
                            <option value="xlsx">XLSX</option>
                            <option value="csv">CSV</option>
                            <option value="xls">XLS</option>
                        </select>
                        <button type="submit" class="btn btn-success">Export</button>
                    </div>
                </form>

            </div>

        </div>




        <h1 class="h3 mb-4 text-gray-800">
            Decline Requests
            <span style="
                display: inline-flex;
                justify-content: center;
                align-items: center;
                width: 45px;
                height: 45px;
                background-color: #4e73df;
                color: white;
                border-radius: 50%;
                font-size: 14px;
               ">
                {{$decline}}
            </span>
        </h1>

        <!-- Filters -->
        <form method="GET" action="{{ route('decline.index') }}" class="mb-3 d-flex justify-content-between align-items-center">
            <!-- Rows selection dropdown (left side) -->
            <div>
                <select name="page_size" class="btn btn-outline-primary" style="max-width: 150px;" onchange="this.form.submit()">
                    <option value="10" {{ request('page_size') == 10 ? 'selected' : '' }}>10 rows</option>
                    <option value="25" {{ request('page_size') == 25 ? 'selected' : '' }}>25 rows</option>
                    <option value="50" {{ request('page_size') == 50 ? 'selected' : '' }}>50 rows</option>
                    <option value="100" {{ request('page_size') == 100 ? 'selected' : '' }}>100 rows</option>
                    <option value="200" {{ request('page_size') == 200 ? 'selected' : '' }}>200 rows</option>
                </select>
            </div>

            <!-- Search input and apply button (right side) -->
            <div class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by name"
                       value="{{ request('search') }}" style="max-width: 300px;">
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </form>

        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Permanent Address</th>
                            <th>Present Address</th>
                            <th>NID</th>
                            <th>IPTSP Number</th>
                            <th>Marketing Manager</th>
                            <th>Registration Type</th>
                            <th>photo</th>
                            <th>NID Front</th>
                            <th>NID Back</th>
                            <th>Options</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $banner)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $banner->full_name }}</td>
                                <td>{{ $banner->phone }}</td>
                                <td>
                                    <a href="mailto:{{ $banner->email }}">{{ $banner->email }}</a>
                                </td>
                                <td>{{ Str::limit($banner->address, 8) }}</td>
                                <td>{{ Str::limit($banner->billing, 8) }}</td>
                                {{--                                <td>{{ $banner->address }}</td>--}}
                                {{--                                <td>{{ $banner->billing }}</td>--}}
                                <td>{{ $banner->nid }}</td>
                                <td>{{ $banner->iptsp }}</td>
                                <td>{{ $banner->reff }}</td>
                                <td>{{ $banner->type }}</td>



                                <td>
                                    @if(pathinfo($banner->photo1, PATHINFO_EXTENSION) == 'pdf')
                                        <a href="{{ asset('images/' . $banner->photo1) }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="40" width="80" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#db4d4d" d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>

                                        </a>
                                    @else
                                        <a href="{{ asset('images/' . $banner->photo1) }}" target="_blank">
                                            <img src="{{ asset('images/' . $banner->photo1) }}" alt="Banner 1"
                                                 class="img-thumbnail"
                                                 style="width: 100px; height: 80px; cursor: pointer;">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if(pathinfo($banner->photo2, PATHINFO_EXTENSION) == 'pdf')
                                        <a href="{{ asset('images/' . $banner->photo2) }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="40" width="80" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#db4d4d" d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>

                                        </a>
                                    @else
                                        <a href="{{ asset('images/' . $banner->photo2) }}" target="_blank">
                                            <img src="{{ asset('images/' . $banner->photo2) }}" alt="Banner 2"
                                                 class="img-thumbnail"
                                                 style="width: 100px; height: 80px; cursor: pointer;">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if(pathinfo($banner->nid_photo, PATHINFO_EXTENSION) == 'pdf')
                                        <a href="{{ asset('images/' . $banner->nid_photo) }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="40" width="80" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#db4d4d" d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>

                                        </a>
                                    @else
                                        <a href="{{ asset('images/' . $banner->nid_photo) }}" target="_blank">
                                            <img src="{{ asset('images/' . $banner->nid_photo) }}" alt="NID Photo"
                                                 class="img-thumbnail"
                                                 style="width: 100px; height: 80px; cursor: pointer;">
                                        </a>
                                    @endif
                                </td>




{{--                                <td><img src=" {{ asset ('images/' . $banner->photo1) }}" alt="Banner" class="img-thumbnail" style="width: 100px; height: 80px;"></td>--}}
{{--                                <td><img src=" {{ asset ('images/' . $banner->photo2) }}" alt="Banner" class="img-thumbnail" style="width: 100px; height: 80px;"></td>--}}
{{--                                <td><img src=" {{ asset ('images/' . $banner->nid_photo) }}" alt="Banner" class="img-thumbnail" style="width: 100px; height: 80px;"></td>--}}


                                <!-- Limit the meta description to 50 characters -->
                                {{--                                <td>{{ Str::limit($banner->meta_description, 50) }}</td>--}}


                                <td>
                                    <!-- Button to trigger modal for viewing full message -->

                                    @if($banner->status == 2)
                                        @if(auth()->user()->hasPermission(8)) {{-- Permission ID for Declined Requests --}}
                                        <a href="{{ route('requests.update', $banner->id) }}" class="btn btn-sm btn-success">
                                            Approve
                                        </a>
                                        @endif

                                    @endif



                                    @if(auth()->user()->hasPermission(4)) {{-- Permission ID for Declined Requests --}}
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewModal-{{ $banner->id }}">
                                        View
                                    </button>
                                    @endif

                                    @if(auth()->user()->hasPermission(5)) {{-- Permission ID for Declined Requests --}}
                                    <!-- Delete Button -->
                                    <a href="{{ route('edit.requests', $banner->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    @endif

                                    @if(auth()->user()->hasPermission(6)) {{-- Permission ID for Declined Requests --}}
                                    <!-- Delete Button -->
                                    <a href="{{ route('requests.destroy', $banner->id) }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endif
                                </td>



                            </tr>

                            <!-- Modal for viewing all the data -->
                            <div class="modal fade" id="viewModal-{{ $banner->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewModalLabel">Contact Message Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Name:</strong> {{ $banner->full_name }}</p>
                                            <p><strong>Phone:</strong> {{ $banner->phone }}</p>
                                            <p><strong>Email:</strong> {{ $banner->email }}</p>
                                            <p><strong>Permanent Address:</strong> {{ $banner->address }}</p>
                                            <p><strong>Present Address:</strong> {{ $banner->billing }}</p>
                                            <p><strong>NID:</strong> {{ $banner->nid }}</p>
                                            <p><strong>IPTSP Number:</strong> {{ $banner->iptsp }}</p>
                                            <p><strong>Marketing Manager:</strong> {{ $banner->reff }}</p>
                                            <p><strong>Registration Type:</strong> {{ $banner->type }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                            <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>

                                        </div>
                                        <div class="modal-body text-center">
                                            <img id="modalImage" src="" alt="Image Preview" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>





                        @endforeach
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        {{ $categories->appends(request()->input())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        // JavaScript function to set the modal image source
        function showImage(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
        }
    </script>

@endsection
