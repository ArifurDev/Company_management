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
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Empolyee Daily Report</h4>
                            <div class="card-description ">

                                <p>Please fill the form correctly!</p>
                            </div>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <ul>
                                            <li>
                                                <p class="text-light">{{ $error }}
                                                </p>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif

                            <form class="forms-sample" action="{{ route("store.empolyeereport") }}" method="POST">
                                @csrf
                              <div class="form-group">
                                <label for="exampleInputIncoming">Incoming card</label>
                                <input type="number" class="form-control text-light" id="exampleInputIncoming" min="0" placeholder="Incoming card" name="incoming_card">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputIncoming">Incoming cash</label>
                                <input type="number" class="form-control text-light" id="exampleInputIncoming" min="0" placeholder="Incoming cash" name="incoming_cash">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputIncoming">Outgoing</label>
                                <input type="number" class="form-control text-light" id="exampleInputIncoming" min="0" placeholder="Outgoing" name="outgoing">
                              </div>


                              <div class="form-group">
                                <label for="exampleTextarea1">Note</label>
                                <textarea class="form-control text-light" id="exampleTextarea1" rows="4" name="note"></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                          </div>
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
    @include('dashbord.allscript')
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>
