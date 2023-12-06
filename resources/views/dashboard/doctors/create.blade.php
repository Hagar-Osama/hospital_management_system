@extends('dashboard.layouts.app')

@section('styles')
    <!-- Internal Select2 css -->
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ asset('backend/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <!---Internal Fancy uploader css-->
    <link href="{{ asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/sumoselect/sumoselect.css') }}">

    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/telephoneinput/telephoneinput.css') }}">
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Doctors</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    Create Doctor</span>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="d-flex my-xl-auto right-content">
            <div class="pe-1 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon me-2 btn-b"><i
                        class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pe-1 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon me-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pe-1 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon me-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate"
                        x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.doctors.store') }}" method="POST" data-parsley-validate=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="name" autofocus placeholder="Enter your name" required=""
                                        type="text">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Email: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="email" placeholder="Enter Email" type="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Password: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="password" placeholder="Enter password" required=""
                                        type="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="price" placeholder="Enter price" required=""
                                        type="number">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="tel" name="phone" id="mobile-number"
                                        placeholder="e.g. +1 702 123 4567">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Sections: <span class="tx-danger">*</span></label>
                                    <select name="section_id" class="form-control SlectBox"
                                        onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                        <!--placeholder-->
                                        <option value="">Select a section</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Appointments: <span class="tx-danger">*</span></label>
                                    <select name="appoints[]" multiple="multiple"
                                        onchange="console.log($(this).children(':selected').length)" class="selectsum1"
                                        required="">
                                        @foreach ($appointments as $appointment)
                                        <option
                                            value="{{$appointment->id}}">
                                            {{$appointment->day}}</option>
                                    @endforeach
                                    </select>
                                    @error('appoints')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-label">File Upload: <span class="tx-danger"></span></label>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                                        <input type="file" accept="image/*" name="file_name" class="dropify">
                                        <img style="border-radius:50%" width="150px" height="150px" id="output" />
                                    </div>

                                </div>
                            </div>
                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10"
                                    type="submit">Submit</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection('content')

@section('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <!-- Internal Select2 js-->
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{ asset('backend/assets/plugins/parsleyjs/parsley.min.js') }}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- Internal Form-validation js -->
    <script src="{{ asset('backend/assets/js/form-validation.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ asset('backend/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>


    <!--Internal Fileuploads js-->
    <script src="{{ asset('backend/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <!--Internal  Form-elements js-->
    <script src="{{ asset('backend/assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2.js') }}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{ asset('backend/assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!-- Internal TelephoneInput js-->
    <script src="{{ asset('backend/assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>
@endsection
