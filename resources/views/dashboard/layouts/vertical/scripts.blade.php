  <!-- Back-to-top -->
  <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

  <!-- Jquery js-->
  <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

  <!-- Bootstrap js-->
  <script src="{{ asset('backend/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Ionicons js-->
  <script src="{{ asset('backend/assets/plugins/ionicons/ionicons.js') }}"></script>

  <!-- Moment js -->
  <script src="{{ asset('backend/assets/plugins/moment/moment.js') }}"></script>

  <!-- P-scroll js -->
  <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

  <!-- Rating js-->
  <script src="{{ asset('backend/assets/plugins/rating/jquery.rating-stars.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/rating/jquery.barrating.js') }}"></script>

  <!-- Sticky js -->
  <script src="{{ asset('backend/assets/js/sticky.js') }}"></script>

  <!-- sidemenu js -->
  <script src="{{ asset('backend/assets/plugins/side-menu/sidemenu.js') }}"></script>

  <!-- Right-sidebar js -->
  <script src="{{ asset('backend/assets/plugins/sidebar/sidebar.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/sidebar/sidebar-custom.js') }}"></script>

  <!-- eva-icons js -->
  <script src="{{ asset('backend/assets/plugins/eva-icons/eva-icons.min.js') }}"></script>

  @yield('scripts')

  <!-- custom js -->
  <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
  {{-- <!-- Internal Data tables -->
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
  <script src="{{ asset('backend/assets/js/table-data.js') }}"></script> --}}
  @livewireScripts
