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
                            <h4 class="card-title">Admin Daily Report Edit</h4>
                            <div class="card-description ">

                                <p>Please fill the form correctly!</p>
                            </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-primary" role="alert">
                                        {{ session::get('success') }}
                                    </div>
                                @endif


                            <form class="forms-sample" action="{{ route('admindailyraport.update',['id'=>$adminriports->id]) }}" method="POST">
                                @csrf
                              <div class="form-group">
                                <label for="house_rent">House Rent</label>
                                <input type="number" class="form-control text-light" id="house_rent" placeholder="house_rent" min="0" name="house_rent" value="{{ $adminriports->house_rent }}">
                              </div>
                              <div class="form-group">
                                <label for="gard_bill">Gard Bill</label>
                                <input type="number" class="form-control text-light" id="gard_bill" placeholder="gard_bill" min="0" name="gard_bill" value="{{ $adminriports->gard_bill }}">
                              </div>
                              <div class="form-group">
                                <label for="electricity_bill">Electricity Bill</label>
                                <input type="number" class="form-control text-light" id="electricity_bill" placeholder="electricity_bill" min="0" name="electricity_bill" value="{{ $adminriports->electricity_bill }}">
                              </div>
                              <div class="form-group">
                                <label for="sewerage_bill">Sewerage Bill</label>
                                <input type="number" class="form-control text-light" id="sewerage_bill" placeholder="sewerage_bill" name="sewerage_bill" value="{{ $adminriports->sewerage_bill }}">
                              </div>
                              <div class="form-group">
                                <label for="expanse">Expanse</label>
                                <input type="number" class="form-control text-light" id="expanse" placeholder="expanse" name="expanse" min="0" value="{{ $adminriports->expanse }}">
                              </div>
                              <div class="form-group">
                                <label for="personal">Personal</label>
                                <input type="number" class="form-control text-light" id="personal" placeholder="personal" name="personal" min="0" value="{{ $adminriports->personal }}">
                              </div>
                              <button type="submit" class="btn btn-primary me-2">Update</button>
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
