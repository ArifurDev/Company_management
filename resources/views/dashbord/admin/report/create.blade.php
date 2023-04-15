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
                            <h4 class="card-title">Admin Daily Report</h4>
                            <div class="card-description ">

                                <p>Please fill the form correctly!</p>
                            </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-primary" role="alert">
                                        {{ session::get('success') }}
                                    </div>
                                @endif
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

                            <form class="forms-sample" action="{{ route('admindailyraport.store') }}" method="POST">
                                @csrf
                              <div class="form-group">
                                <label for="house_rent">House Rent</label>
                                <input type="number" class="form-control text-light" id="house_rent" min="0" placeholder="House Rent" name="house_rent" >
                              </div>
                              <div class="form-group">
                                <label for="gard_bill">Card Bill</label>
                                <input type="number" class="form-control text-light" id="gard_bill" min="0" placeholder="Card Bill" name="gard_bill">
                              </div>
                              <div class="form-group">
                                <label for="electricity_bill">Electricity Bill</label>
                                <input type="number" class="form-control text-light" id="electricity_bill" min="0" placeholder="Electricity Bill" name="electricity_bill">
                              </div>
                              <div class="form-group">
                                <label for="sewerage_bill">Sewerage Bill</label>
                                <input type="number" class="form-control text-light" id="sewerage_bill" min="0" placeholder="Sewerage Bill" name="sewerage_bill">
                              </div>


                              <div class="form-group">
                                <label for="Water_bill">Water Bill</label>
                                <input type="number" class="form-control text-light" id="Water_bill" min="0" placeholder="Water Bill" name="water_bill">
                              </div>
                              <div class="form-group">
                                <label for="Fewa_bill">Fewa Bill</label>
                                <input type="number" class="form-control text-light" id="Fewa_bill" min="0" placeholder="Fewa Bill" name="fewa_bill">
                              </div><div class="form-group">
                                <label for="Wifi_bill">Wifi Bill</label>
                                <input type="number" class="form-control text-light" id="Wifi_bill" min="0" placeholder="Wifi Bill" name="wifi_bill">
                              </div>


                              <div class="form-group">
                                <label for="expanse">Expanse</label>
                                <input type="number" class="form-control text-light" id="expanse" min="0" placeholder="expanse" name="expanse">
                              </div>
                              <div class="form-group">
                                <label for="personal">Personal</label>
                                <input type="number" class="form-control text-light" id="personal" min="0" placeholder="personal" name="personal">
                              </div>

                              <div class="form-group">
                                <label for="a">A</label>
                                <input type="number" class="form-control text-light" min="0" id="a" placeholder="A" name="a">
                              </div>
                              <div class="form-group">
                                <label for="b">B</label>
                                <input type="number" class="form-control text-light" min="0" id="b" placeholder="B" name="b">
                              </div>
                              <div class="form-group">
                                <label for="c">C</label>
                                <input type="number" class="form-control text-light" min="0" id="c" placeholder="C" name="c">
                              </div>

                              <div class="form-group">
                                <label for="exampleFormControlTextarea1">Note</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
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
