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
                            <h4 class="card-title">Payment Date</h4>
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
                                @foreach ($payment_date  as $payment_date )
                                <form class="form-sample" action="{{ route('payment.date.update',['id'=>$payment_date->id]) }}" method="POST">
                                    @csrf


                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">House Rent</label>
                                          <div class="col-sm-9">
                                            <input type="number" min="1" max="31" class="form-control" name="house_rent" value="{{ $payment_date->house_rent }}">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Card Bill</label>
                                          <div class="col-sm-9">
                                            <input type="number" min="1" max="31" class="form-control" name="gard_bill" value="{{ $payment_date->gard_bill }}">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Electricity Bill</label>
                                            <div class="col-sm-9">
                                              <input type="number" min="1" max="31" class="form-control" name="electricity_bill" value="{{ $payment_date->electricity_bill }}">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sewerage Bill</label>
                                            <div class="col-sm-9">
                                              <input type="number" min="1" max="31" class="form-control" name="sewerage_bill" value="{{ $payment_date->sewerage_bill }}">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Water Bill</label>
                                            <div class="col-sm-9">
                                              <input type="number" min="1" max="31" class="form-control" name="water_bill" value="{{ $payment_date->water_bill }}">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">	Fewa Bill</label>
                                            <div class="col-sm-9">
                                              <input type="number" min="1" max="31" class="form-control" name="fewa_bill" value="{{ $payment_date->fewa_bill }}">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Wifi Bill</label>
                                            <div class="col-sm-9">
                                              <input type="number" min="1" max="31" class="form-control" name="wifi_bill" value="{{ $payment_date->wifi_bill }}">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">A</label>
                                            <div class="col-sm-9">
                                              <input type="number" min="1" max="31" class="form-control" name="a" value="{{ $payment_date->a }}">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">B</label>
                                            <div class="col-sm-9">
                                              <input type="number" min="1" max="31" class="form-control" name="b" value="{{ $payment_date->b }}">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">c</label>
                                            <div class="col-sm-9">
                                              <input type="number" min="1" max="31" class="form-control" name="c" value="{{ $payment_date->c }}">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Empolyee</label>
                                            <div class="col-sm-9">
                                              <input type="number" min="1" max="31" class="form-control" name="empolyee" value="{{ $payment_date->empolyee }}">
                                            </div>
                                          </div>
                                        </div>

                                      </div>

                                      <button type="submit" class="btn btn-primary">Update</button>
                                  </form>
                                  @endforeach
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



</body>

</html>
