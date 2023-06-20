<!-- plugins:js -->
<script src="{{ asset('dashbord/assets') }}/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('dashbord/assets') }}/vendors/chart.js/Chart.min.js"></script>
<script src="{{ asset('dashbord/assets') }}/vendors/progressbar.js/progressbar.min.js"></script>
<script src="{{ asset('dashbord/assets') }}/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="{{ asset('dashbord/assets') }}/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('dashbord/assets') }}/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<script src="{{ asset('dashbord/assets') }}/js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('dashbord/assets') }}/js/off-canvas.js"></script>
<script src="{{ asset('dashbord/assets') }}/js/hoverable-collapse.js"></script>
<script src="{{ asset('dashbord/assets') }}/js/misc.js"></script>
<script src="{{ asset('dashbord/assets') }}/js/settings.js"></script>
<script src="{{ asset('dashbord/assets') }}/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('dashbord/assets') }}/js/dashboard.js"></script>
<!-- End custom js for this page -->

<!-- toastr   -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif
</script>

    <!-- datatables JS -->
    <script src="{{ asset('dashbord/assets/js/datatable.js') }}"></script>

    <script src="{{ asset('dashbord/assets/js/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashbord/assets/js/dataTables.responsive.min.js') }}"></script>


  <!-- datatables JS -->
  <script src="js/jquery.app.js"></script>

  <script src="{{ asset('dashbord/assets') }}/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('dashbord/assets') }}/datatables/dataTables.bootstrap.js"></script>


  <script type="text/javascript">
      $(document).ready(function() {
          $('#datatable').dataTable();


        //   $('#example').DataTable();
          var table = $('#example').DataTable( {
                responsive: true
            } );

            new $.fn.dataTable.FixedHeader( table );
      } );



  </script>

