<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Astha Insight Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        .custom-bg {
            background-color: #323232 !important; /* Use the custom color */
        }
    </style>


    @yield('css')

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    @include('alert')



    <!-- Sidebar -->
    <ul class="navbar-nav custom-bg sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('registration')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-home"></i>
            </div>
            <div class="sidebar-brand-text mx-3"> Astha <sup></sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            @if(auth()->user()->hasPermission(10)) {{-- Permission ID for All Requests --}}
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            @endif
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            @if(auth()->user()->hasPermission(1)) {{-- Permission ID for All Requests --}}
            <a class="nav-link" href="{{ route('requests.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>All Requests</span>
            </a>
            @endif
        </li>

        <li class="nav-item">
            @if(auth()->user()->hasPermission(2)) {{-- Permission ID for Approved Requests --}}
            <a class="nav-link" href="{{ route('approved.index') }}">
                <i class="fas fa-fw fa-check"></i>
                <span>Approved Requests</span>
            </a>
            @endif
        </li>

        <li class="nav-item">
            @if(auth()->user()->hasPermission(3)) {{-- Permission ID for Declined Requests --}}
            <a class="nav-link" href="{{ route('decline.index') }}">
                <i class="fas fa-fw fa-crosshairs"></i>
                <span>Decline Requests</span>
            </a>
            @endif
        </li>



        {{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{route('requests.index')}}">--}}
{{--                <i class="fas fa-fw fa-table"></i>--}}
{{--                <span>All Requests</span></a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{route('approved.index')}}">--}}
{{--                <i class="fas fa-fw fa-check"></i>--}}
{{--                <span>Approved Requests</span></a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{route('decline.index')}}">--}}
{{--                <i class="fas fa-fw fa-crosshairs"></i>--}}
{{--                <span>Decline Requests</span></a>--}}
{{--        </li>--}}

        <li class="nav-item">
            @if(auth()->user()->hasPermission(7)) {{-- Permission ID for Declined Requests --}}
            <a class="nav-link" href="{{ route('user.permissions', ['userId' => auth()->id()]) }}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Permission settings</span>
            </a>
            @endif
        </li>

        <li class="nav-item">
            @if(auth()->user()->hasPermission(11)) {{-- Permission ID for Declined Requests --}}
            <a class="nav-link" href="{{route('sub.index')}}">
                <i class="fas fa-plus-square"></i>
                <span>Create Sub Admin</span></a>
            @endif
        </li>

        <li class="nav-item">
            @if(auth()->user()->hasPermission(12)) {{-- Permission ID for Declined Requests --}}
            <a class="nav-link" href="{{route('profile.edit')}}">
                <i class="fas fa-lock"></i>
                <span>Change Password</span></a>
            @endif
        </li>

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"--}}
{{--               aria-expanded="true" aria-controls="collapseOne">--}}
{{--                <i class="fas fa-fw fa-share"></i>--}}
{{--                <span>Social Responsibility</span>--}}
{{--            </a>--}}
{{--            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    --}}{{--                    <h6 class="collapse-header">Custom Components:</h6>--}}
{{--                    <a class="collapse-item" href="{{route('socialbanner.index')}}">Social Page Banners</a>--}}
{{--                    <a class="collapse-item" href="{{route('event_media.index')}}">Events & Media</a>--}}
{{--                    <a class="collapse-item" href="{{route('aboutsocial.edit')}}">About Social </a>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{route('contact.index')}}">--}}
{{--                <i class="fas fa-fw fa-file-contract"></i>--}}
{{--                <span>Contact Messages</span></a>--}}
{{--        </li>--}}




{{--        <!-- Heading -->--}}
{{--        <div class="sidebar-heading">--}}
{{--            Interface--}}
{{--        </div>--}}

{{--        <!-- Nav Item - Pages Collapse Menu -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"--}}
{{--               aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Homepage Settings</span>--}}
{{--            </a>--}}
{{--            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    --}}{{--                    <h6 class="collapse-header">Custom Components:</h6>--}}
{{--                    <a class="collapse-item" href="{{route('homebanner.index')}}">Banner Section</a>--}}
{{--                    <a class="collapse-item" href="{{route('homevideo.index')}}">Video Banner</a>--}}
{{--                    <a class="collapse-item" href="{{route('homegallery.index')}}">Equity Gallery</a>--}}
{{--                    <a class="collapse-item" href="{{route('hello.edit')}}">Hello Section</a>--}}
{{--                    <a class="collapse-item" href="{{route('counter.edit')}}">Counter Section</a>--}}
{{--                    <a class="collapse-item" href="{{route('text.edit')}}">Dynamic Texts</a>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}




{{--        <!-- Nav Item - Utilities Collapse Menu -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"--}}
{{--               aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--                <i class="fas fa-fw fa-wrench"></i>--}}
{{--                <span>Header & Footer</span>--}}
{{--            </a>--}}
{{--            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"--}}
{{--                 data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}

{{--                    <a class="collapse-item" href="{{route('header.edit')}}">Header</a>--}}
{{--                    <a class="collapse-item" href="{{route('footer.edit')}}">Footer & Contact</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}


{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"--}}
{{--               aria-expanded="true" aria-controls="collapsePages">--}}
{{--                <i class="fas fa-fw fa-address-book"></i>--}}
{{--                <span>About </span>--}}
{{--            </a>--}}
{{--            <div id="collapsePages" class="collapse" aria-labelledby="headingPages"--}}
{{--                 data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}

{{--                    <a class="collapse-item" href="{{route('about.edit')}}">About Us</a>--}}
{{--                    <a class="collapse-item" href="{{route('aboutbanner.index')}}">About Page Banners</a>--}}
{{--                    <a class="collapse-item" href="{{route('employee.index')}}">Long Service Employees</a>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}





        <!-- Nav Item - Pages Collapse Menu -->





        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->


    </ul>
    <!-- End of Sidebar -->










    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>



                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle"
                                 src="{{asset('backend/img/undraw_profile.svg')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            {{--                            <a class="dropdown-item" href="#">--}}
                            {{--                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>--}}
                            {{--                                Profile--}}
                            {{--                            </a>--}}
                            {{--                            <a class="dropdown-item" href="#">--}}
                            {{--                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>--}}
                            {{--                                Settings--}}
                            {{--                            </a>--}}
                            {{--                            <a class="dropdown-item" href="#">--}}
                            {{--                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>--}}
                            {{--                                Activity Log--}}
                            {{--                            </a>--}}
                            {{--                            <div class="dropdown-divider"></div>--}}
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->












            @yield('content')















            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Astha Insight 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you would like to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form  action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button class="btn btn-primary" type="submit" >Logout</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('backend/js/demo/chart-pie-demo.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#shortStoryText').summernote();
            $('#description').summernote();
            $('#textarea').summernote();
        });
    </script>



@yield('js')




</body>

</html>
