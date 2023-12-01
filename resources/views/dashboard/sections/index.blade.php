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
        <link href="{{asset('backend/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
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
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">SECTIONS TABLE</h4>
                        <a class="btn ripple btn-primary" style="float: right" data-bs-target="#addSection"
                            data-bs-toggle="modal" href="">Add Section</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Section name</th>
                                    <th class="wd-15p border-bottom-0">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td><a class="btn ripple btn-success"
                                                data-bs-target="#editSection{{ $section->id }}" data-bs-toggle="modal"
                                                href="">Edit Section</a>
                                            <a class="btn ripple btn-danger"
                                                data-bs-target="#deleteSection{{ $section->id }}" data-bs-toggle="modal"
                                                href="">Delete Section</a>
                                        </td>

                                    </tr>
                                    @include('dashboard.sections.edit')
                                    @include('dashboard.sections.delete')
                                @endforeach

                            </tbody>
                        </table>
                        @include('dashboard.sections.create')
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
         <script src="{{asset('backend/plugins/notify/js/notifIt.js')}}"></script>
         <script src="{{asset('backend/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
