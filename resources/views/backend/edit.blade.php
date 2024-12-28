@extends('backend.layouts.app')
@section('css')
    <link href={{asset("registrationpage/A.main.css.pagespeed.cf.jtbz5LK-HU.css")}} rel="stylesheet" media="all">

@endsection

@section('content')

    <div class="container mt-5">

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
                <h2 class="title">Update Information</h2>
            </div>

            <form name="form" id="form" action="{{ route('registration.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Add PUT method for updates -->
                <div class="card-body">
                    <div class="form-row">
                        <div class="name">Full name<span style="color: red">*</span></div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="full_name" value="{{ old('full_name', $category->full_name) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Phone<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="number" name="phone" placeholder="017xxxxxxxx" value="{{ old('phone', $category->phone) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Email address<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="email" name="email" placeholder="example@email.com" value="{{ old('email', $category->email) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Permanent Address<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="textarea--style-6" name="address" placeholder="According to NID" required>{{ old('address', $category->address) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Present Address<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="textarea--style-6" name="billing" placeholder="Enter your current address" required>{{ old('billing', $category->billing) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">NID<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="number" name="nid" placeholder="National ID" value="{{ old('nid', $category->nid) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Your Choice IPTSP Number<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="number" name="iptsp" placeholder="09649 XXXXXX" value="{{ old('iptsp', $category->iptsp) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Marketing Manager</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="text" name="reff" placeholder="Manager Name" value="{{ old('reff', $category->reff) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Registration Type</div>
                        <div class="value">
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option value="Personal" {{ $category->type == 'Personal' ? 'selected' : '' }}>Personal</option>
                                <option value="Corporate" {{ $category->type == 'Corporate' ? 'selected' : '' }}>Corporate</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Upload Your Photo<span style="color: red">*</span></div>
                        <div class="value">
                            <div class="input-group js-input-file">
                                <input type="file" name="photo1" id="file">
                                <img src="{{ asset('images/' . $category->photo1) }}" alt="Photo" class="img-thumbnail" style="width: 100px;">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Upload Your NID<span style="color: red">*</span><br>(Front side)</div>
                        <div class="value">
                            <input type="file" name="photo2" id="file">
                            <img src="{{ asset('images/' . $category->photo2) }}" alt="Photo" class="img-thumbnail" style="width: 100px;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Upload Your NID<span style="color: red">*</span><br>(Back side)</div>
                        <div class="value">
                            <input type="file" name="nid_photo" id="file">
                            <img src="{{ asset('images/' . $category->nid_photo) }}" alt="Photo" class="img-thumbnail" style="width: 100px;">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" type="submit">Update</button>
                    </div>
                </div>
            </form>



            {{--            <form name="form" id="form" action="{{route('registration.store')}}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="card-body">--}}

{{--                    <div class="form-row">--}}
{{--                        <div class="name">Full name<span style="color: red">*</span></div>--}}
{{--                        <div class="value">--}}
{{--                            <input class="input--style-6" type="text" name="full_name" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="name">Phone<span style="color: red">*</span></div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group">--}}
{{--                                <input class="input--style-6" type="number" name="phone" placeholder="017xxxxxxxx" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="name">Email address<span style="color: red">*</span></div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group">--}}
{{--                                <input class="input--style-6" type="email" name="email" placeholder="example@email.com" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="name">Permanent Address<span style="color: red">*</span></div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group">--}}
{{--                                <textarea class="textarea--style-6" name="address" placeholder="According to NID" required></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="name">Present Address<span style="color: red">*</span></div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group">--}}
{{--                                <textarea class="textarea--style-6" name="billing" placeholder="Enter your current address" required></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="name">NID <span style="color: red">*</span></div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group">--}}
{{--                                <input class="input--style-6" type="number" name="nid" placeholder="National ID" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="name">Your Choice IPTSP Number<span style="color: red">*</span></div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group">--}}
{{--                                <input class="input--style-6" type="number" name="iptsp" placeholder="09649 XXXXXX " required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="name">Marketing Manager</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group">--}}
{{--                                <input class="input--style-6" type="text" name="reff" placeholder="Manager Name">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="form-row">--}}
{{--                        <div class="name">Registration Type</div>--}}
{{--                        <div class="value">--}}
{{--                            <select class="form-select" aria-label="Default select example" name="type">--}}
{{--                                <option value="Personal">Personal</option>--}}
{{--                                <option value="Corporate">Corporate</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-row">--}}
{{--                        <div class="name">Upload Your Photo<span style="color: red">*</span></div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group js-input-file">--}}
{{--                                <div class="input-group js-input-file">--}}
{{--                                    <input type="file" name="photo1" id="file" multiple="" value="{{ $category->icon }}" required>--}}

{{--                                </div>--}}
{{--                                <img src=" {{ asset ('images/' . $category->photo1) }}" alt="Banner" class="img-thumbnail" style="width: 100px;">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}



{{--                    <div class="form-row">--}}
{{--                        <div class="name">Upload Your NID <span style="color: red">*</span> <br>  (Front side) </div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group js-input-file">--}}
{{--                                <div class="input-group js-input-file">--}}
{{--                                    <input type="file" name="photo2" id="file" multiple="" required>--}}

{{--                                </div>--}}
{{--                                <div class="label--desc">Select ( jpg or pdf ) or Any other relevant file and Upload.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                    </div>--}}

{{--                    <div class="form-row">--}}
{{--                        <div class="name">--}}
{{--                            Upload Your NID <span style="color: red">*</span> <br>    (Back side)--}}
{{--                        </div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group js-input-file">--}}
{{--                                <input type="file" name="nid_photo" id="file" multiple required>--}}
{{--                            </div>--}}
{{--                            <div class="label--desc">Select (jpg or pdf) or any other relevant file and upload.</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="card-footer">--}}
{{--                        <button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit" id="submit">Send Request</button>--}}
{{--                    </div>--}}





{{--                    --}}{{--                    <style>--}}
{{--                    --}}{{--                        .pappu {--}}
{{--                    --}}{{--                            color: #000;--}}
{{--                    --}}{{--                            padding: 10px;--}}
{{--                    --}}{{--                            text-align: center;--}}
{{--                    --}}{{--                            font-style: revert;--}}
{{--                    --}}{{--                            text-decoration: none;--}}
{{--                    --}}{{--                            font-size: 15px;--}}
{{--                    --}}{{--                            background: #2c6ed5;--}}
{{--                    --}}{{--                            box-shadow: -6px 3px 5px 0 #1f1b1b--}}
{{--                    --}}{{--                        }--}}

{{--                    --}}{{--                        .pappu a {--}}
{{--                    --}}{{--                            color: #fff !important;--}}
{{--                    --}}{{--                            text-decoration: none !important--}}
{{--                    --}}{{--                        }--}}
{{--                    --}}{{--                    </style>--}}


{{--                    --}}{{--                    <div class="pappu"> Already have an account ? <a href="http://ipt.sarkercommunication.com/user/">  Sign In  </a> </div>--}}


{{--                </div></form>--}}
        </div>
    </div>



@endsection

@section('js')

    <!-- Jquery JS-->
    <script src="vendor,_jquery,_jquery.min.js+js,_global.js.pagespeed.jc.IJ9zrQKx7L.js"></script><script>eval(mod_pagespeed_RBSBR7CYnu);</script>


    <!-- Main JS-->
    <script>eval(mod_pagespeed_w5Cpa6lc7G);</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>




@endsection
