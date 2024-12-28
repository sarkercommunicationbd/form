<html lang="en" style=""><head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Astha Call</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Main CSS-->
    <link href={{asset("registrationpage/A.main.css.pagespeed.cf.jtbz5LK-HU.css")}} rel="stylesheet" media="all">
</head>

<body cz-shortcut-listen="true" style="">




{{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--    <div class="container-fluid">--}}
{{--        <a class="navbar-brand" href="{{route('registration')}}">Bangla Call</a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="#">Registration Form</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="#">Recharge</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Package</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">forum</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Tearm &amp; Condition</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<div class="page-wrapper bg-violet p-t-100 p-b-50">
    <div class="wrapper wrapper--w900">
        <div class="card card-6 shadow-lg">


            @include('alert')

{{--            @if(session('success'))--}}
{{--                <script>--}}
{{--                    Swal.fire({--}}
{{--                        title: "Good job!",--}}
{{--                        text: "{{ session('success') }}",--}}
{{--                        icon: "success"--}}
{{--                    });--}}
{{--                </script>--}}
{{--            @endif--}}


            <div class="card-heading">
                <h2 class="title">Apply For Call Registration</h2>
            </div>


            <form name="form" id="form" action="{{route('registration.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-row">
                        <div class="name">Full name<span style="color: red">*</span></div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="full_name" value="{{ old('full_name') }}" required>
                            @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Phone<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="number" name="phone" value="{{ old('phone') }}" placeholder="017xxxxxxxx" required>
                            </div>
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Email address<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" required>
                            </div>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Permanent Address<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="textarea--style-6" name="address" placeholder="According to NID" required>{{ old('address') }}</textarea>
                            </div>
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Present Address<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="textarea--style-6" name="billing" placeholder="Enter your current address" required>{{ old('billing') }}</textarea>
                            </div>
                            @error('billing')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">NID <span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="number" name="nid" value="{{ old('nid') }}" placeholder="National ID" required>
                            </div>
                            @error('nid')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Your Choice IPTSP Number<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="number" name="iptsp" value="{{ old('iptsp') }}" placeholder="09649 XXXXXX" required>
                            </div>
                            @error('iptsp')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Marketing Manager</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="text" name="reff" value="{{ old('reff') }}" placeholder="Manager Name">
                            </div>
                            @error('reff')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="name">Registration Type<span style="color: red">*</span></div>
                        <div class="value">
                            <select class="form-select" aria-label="Default select example" name="type" required>
                                <option value="">Select Type</option>
                                <option value="Personal" {{ old('type') == 'Personal' ? 'selected' : '' }}>Personal</option>
                                <option value="Corporate" {{ old('type') == 'Corporate' ? 'selected' : '' }}>Corporate</option>
                            </select>
                            @error('type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="name">Upload Your Photo<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group js-input-file">
                                <div class="input-group js-input-file">
                                    <input type="file" name="photo1" id="file" multiple="" required>

                                </div>
                                <div class="label--desc">Select ( jpg or pdf ) Photo or Any other relevant file and Upload.</div>
                            </div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="name">Upload Your NID <span style="color: red">*</span> <br>  (Front side) </div>
                        <div class="value">
                            <div class="input-group js-input-file">
                                <div class="input-group js-input-file">
                                    <input type="file" name="photo2" id="file" multiple="" required>

                                </div>
                                <div class="label--desc">Select ( jpg or pdf ) or Any other relevant file and Upload.</div>
                            </div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="name">
                            Upload Your NID <span style="color: red">*</span> <br>    (Back side)
                        </div>
                        <div class="value">
                            <div class="input-group js-input-file">
                                <input type="file" name="nid_photo" id="file" multiple required>
                            </div>
                            <div class="label--desc">Select (jpg or pdf) or any other relevant file and upload.</div>
                        </div>
                    </div>







                    <!-- Repeat for other fields with validation errors -->

                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" type="submit">Send Request</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor,_jquery,_jquery.min.js+js,_global.js.pagespeed.jc.IJ9zrQKx7L.js"></script><script>eval(mod_pagespeed_RBSBR7CYnu);</script>


    <!-- Main JS-->
    <script>eval(mod_pagespeed_w5Cpa6lc7G);</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>







</div></body><!-- This templates was made by Colorlib (https://colorlib.com) --></html>
