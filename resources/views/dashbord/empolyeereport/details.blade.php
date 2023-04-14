<!DOCTYPE html>
<html lang="en">

<head>
    {{-- all link --}}
    @include('dashbord.headerlink')


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            @include('dashbord.sidebar')
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('dashbord.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="card" >

                            <div class="card-body">
                              <h5 class="card-title">Empolyee Report</h5>

                            </div>
                            <ul class="list-group  bg-dark">
                              <li class="list-group-item">Company:- {{ $details->company }}</li>
                              <li class="list-group-item">Empolyee Email:- {{ $details->empolyee }}</li>
                              <li class="list-group-item">Incoming Card:- {{ $details->incoming_card }}</li>
                              <li class="list-group-item">Incoming Cash:- {{ $details->incoming_cash }}</li>
                              <li class="list-group-item">Incoming:- {{ $details->incoming }}</li>
                              <li class="list-group-item">Outgoing:- {{ $details->outgoing }}</li>
                              <li class="list-group-item">Cash:- {{ $details->cash }}</li>
                              <li class="list-group-item">Note:- {{ $details->note }}</li>
                              <li class="list-group-item">Submited_at:- {{ $details->created_at }}</li>
                              <li class="list-group-item">Updated_at:- {{ $details->updated_at }}</li>
                            </ul>

                          </div>
                    </div>


                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('dashbord.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    @include('dashbord.allscript')
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>
