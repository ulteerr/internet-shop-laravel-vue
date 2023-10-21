 <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
 <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
 <script>
     $('.select_multiple').select2()
     $('.select').select2()
 </script>
  @vite('resources/js/admin.js')
