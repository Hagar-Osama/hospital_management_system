@extends('dashboard.layouts.app')

@section('styles')
    <!-- Internal Data table css -->
    <link href="{{ asset('backend/assets/plugins/datatable/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/datatable/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Owl Carousel css-->
    <link href="{{ asset('backend/assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    <!---Internal  Multislider css-->
    <link href="{{ asset('backend/assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ asset('backend/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

    <!---Internal  Owl Carousel css-->
    <link href="{{ asset('backend/assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    <!--- Internal Sweet-Alert css-->
    <link href="{{ asset('backend/assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('dashboard.pages.messages')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Data
                    Tables</span>
            </div>
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Doctors TABLE</h4>
                        <a class="btn ripple btn-primary" style="float: right"
                            href="{{ route('admin.doctors.create') }}">Add
                            Doctor</a>

                    </div>
                    <button type="button" class="btn btn-danger" id="btn-delete-all">Delete Selected</button>

                </div>
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0"><input type="checkbox" name="select-all"
                                            id="example-select-all"></th>
                                    <th class="wd-10p border-bottom-0">#</th>
                                    <th class="wd-10p border-bottom-0">Docotr name</th>
                                    <th class="wd-10p border-bottom-0">Docotr Image</th>
                                    <th class="wd-10p border-bottom-0">Docotr Email</th>
                                    <th class="wd-10p border-bottom-0">Doctor's Section</th>
                                    <th class="wd-10p border-bottom-0">Doctor's Status</th>
                                    <th class="wd-10p border-bottom-0">Appointments</th>
                                    <th class="wd-10p border-bottom-0">Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="delete-selected" value="{{ $doctor->id }}"
                                                class="delete_select">
                                        </td>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $doctor->name }}</td>
                                        <td><img src="{{ !empty($doctor->image->file_name) ? asset('storage/doctors/' . $doctor->image->file_name) : '' }}"
                                                style="width: 40%; height:40%"></td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->section->name ?? '' }}</td>

                                        <td>
                                            @if ($doctor->status == App\Http\Enums\DoctorStatusEnum::ACTIVE)
                                                <a href="{{route('admin.doctors.updateStatus', $doctor->id)}}"<button class="badge rounded-pill bg-success">Active</button>
                                            @else
                                                <a href="{{route('admin.doctors.updateStatus', $doctor->id)}}"<button class="badge rounded-pill bg-danger">InActive</button>

                                            @endif
                                        </td>
                                        <td>
                                            @foreach ($doctor->appointments as $appointment)
                                                <li>{{ $appointment->day }}</li>
                                            @endforeach

                                        </td>
                                        <td>
                                            <a class="btn ripple btn-sm btn-success"
                                                href="{{ route('admin.doctors.edit', ['doctorId' => $doctor->id]) }}">Edit</a>
                                            <a class="btn ripple btn-sm btn-danger"
                                                data-bs-target="#deleteDoctor{{ $doctor->id }}" data-bs-toggle="modal"
                                                href="">Delete</a>
                                        </td>

                                    </tr>
                                    @include('dashboard.doctors.delete-all')
                                    @include('dashboard.doctors.delete')
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!--/div-->


    </div>
    <!-- /row -->
@endsection('content')

@section('scripts')
    <!-- Internal Data tables -->
    <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>

    <!--Internal  Datatable js -->
    <script src="{{ asset('backend/assets/js/table-data.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ asset('backend/assets/js/modal.js') }}"></script>

    <!--Internal  Notify js -->
    <script src="{{ asset('backend/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ asset('backend/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Internal Rating js-->
    <script src="{{ asset('backend/assets/plugins/rating/ratings.js') }}"></script>

    <!--Internal  Sweet-Alert js-->
    <script src="{{ asset('backend/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/sweet-alert/jquery.sweet-alert.js') }}"></script>

    <!-- Sweet-alert js  -->
    <script src="{{ asset('backend/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/sweet-alert.js') }}"></script>

    <script>
        $(function() {
            jQuery("[name=select-all]").click(function(source) {
                checkboxes = jQuery("[name=delete-selected]");
                for (var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>



    <script type="text/JavaScript">
        $(function () {
            $("#btn-delete-all").click(function () {
            var selected = [];
            $("#example1 input[name=delete-selected]:checked").each(function () {
            selected.push(this.value);
            });

            if (selected.length > 0) {
                        $('#delete_select').modal('show')
                        $('input[id="selected-id"]').val(selected);
                    }
                });
            });
        </script>
@endsection
