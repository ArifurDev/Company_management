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
                    <div class="row ">
                        <div class="col-md-6 grid-margin stretch-card m-auto">
                          <div class="card">
                            @if (Session::has('success'))
                            <div class="alert alert-primary" role="alert">
                                {{ session::get('success') }}
                            </div>
                        @endif
                            <div class="card-body">
                              <h4 class="card-title">Loan Send --Edit</h4>
                              <form class="forms-sample" action="{{ route('adminLoanReportSend.update',['id'=>$loanSend->id]) }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" name="name" value="{{ $loanSend->name }}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                  <div class="col-sm-9">
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" name="email" value="{{ $loanSend->email }}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number" name="number" value="{{ $loanSend->number }}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="amount" placeholder="Amount" name="amount" value="{{ $loanSend->amount }}">
                                    </div>
                                  </div>
                                <div class="form-group row">
                                    <label for="recive_date" class="col-sm-3 col-form-label">Loan Recive Date</label>
                                    <div class="col-sm-9">
                                      <input type="date" class="form-control" id="recive_date" placeholder="Mobile number" name="recive_date" value="{{ $loanSend->recive_date }}">
                                    </div>
                                  </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                              </form>
                            </div>
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
