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
                              <h4 class="card-title">Loan Send</h4>
                              <form class="forms-sample" action="{{ route('adminLoanReportSend.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" name="name">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                  <div class="col-sm-9">
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" name="email">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number" name="number">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="amount" placeholder="Amount" name="amount">
                                    </div>
                                  </div>
                                <div class="form-group row">
                                    <label for="recive_date" class="col-sm-3 col-form-label">Loan Recive Date</label>
                                    <div class="col-sm-9">
                                      <input type="date" class="form-control" id="recive_date" placeholder="Mobile number" name="recive_date">
                                    </div>
                                  </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                              </form>
                            </div>
                          </div>
                        </div>


                      </div>
                      <div class="row mt-2">
                        <div class="col-lg-12 grid-margin stretch-card m-auto">
                            <div class="card">
                              <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Loan Send show Data</h4>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#largeModal">
                                       Trash Bin
                                     </button>
                                </div>
                                <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content  bg-dark">
                                        <div class="modal-header ">
                                        <h5 class="modal-title" id="exampleModalLabel3">Trash Bin</h5>
                                        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-1">
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-dark">

                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Number</th>
                                                        <th>Amount</th>
                                                        <th>Loan Recive Date</th>
                                                        <th>Action</th>
                                                      </tr>
                                                </thead>

                                                    @foreach ($loanSend_trashed as $treshed_info)
                                                    <tr>
                                                        <td>{{ $treshed_info->name }}</td>
                                                        <td>{{ $treshed_info->email }}</td>
                                                        <td>{{ $treshed_info->number }}</td>
                                                        <td>{{ $treshed_info->amount }} tk</td>
                                                        <td>{{ $treshed_info->recive_date }}</td>
                                                        <td>
                                                          <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ route('adminLoanReportSend.restor',['id'=>$treshed_info->id ]) }}" class="btn btn-outline-secondary" title="restore">
                                                              <i class="mdi mdi-backup-restore"></i>
                                                            </a>
                                                            <a href="{{ route('adminLoanReportSend.delete',['id'=>$treshed_info->id ]) }}" class="btn btn-outline-secondary" title="delete forever">
                                                              <i class="mdi mdi-delete"></i>
                                                            </a>
                                                          </div>
                                                        </td>
                                                      </tr>
                                                    @endforeach
                                                </table>
                                            </div>

                                        </div>

                                    </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Amount</th>
                                        <th>Loan Recive Date</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loanSend as $loanSend)
                                        <tr>
                                            <td>{{ $loanSend->name }}</td>
                                            <td>{{ $loanSend->email }}</td>
                                            <td>{{ $loanSend->number }}</td>
                                            <td>{{ $loanSend->amount }} tk</td>
                                            <td>{{ $loanSend->recive_date }}</td>
                                            <td>
                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('adminLoanReportSend.edit',['id'=>$loanSend->id]) }}" class="btn btn-outline-secondary" title="Edit">
                                                  <i class="mdi mdi-file-check btn-icon-append"></i>
                                                </a>
                                                <a href="{{ route('adminLoanReportSend.destroy',['id'=>$loanSend->id]) }}" class="btn btn-outline-secondary" title="delete temp">
                                                  <i class="mdi mdi-delete"></i>
                                                </a>
                                              </div>
                                            </td>
                                          </tr>
                                        @endforeach


                                    </tbody>
                                  </table>
                                </div>
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
