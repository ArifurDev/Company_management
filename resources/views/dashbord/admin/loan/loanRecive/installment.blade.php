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

                      <div class="row mt-2">
                        <div class="col-lg-12 grid-margin stretch-card m-auto">
                            <div class="card">
                                @if (Session::has('success'))
                                <div class="alert alert-primary" role="alert">
                                    {{ session::get('success') }}
                                </div>
                                @endif

                              <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">loan recive installment list</h4>

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
                                                        <th>Amount</th>
                                                        <th>Amount Due</th>
                                                        <th>Installment</th>
                                                        <th>Payment Date</th>
                                                        <th>Action</th>
                                                      </tr>
                                                </thead>

                                                    @foreach ($recive_installment_trashed as $installment_trashed)
                                                    <tr>
                                                        <td>{{ $installment_trashed->name }}</td>
                                                        <td>{{ $installment_trashed->email }}</td>
                                                        <td>{{ $installment_trashed->amount }} tk</td>
                                                        <td>{{ $installment_trashed->amount_due }} tk</td>
                                                        <td>{{ $installment_trashed->installment }}</td>
                                                        <td>{{ $installment_trashed->payment_date }}</td>
                                                        <td>
                                                          <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ route('loanReciveInstallment.restor',['id'=>$installment_trashed->id]) }}" class="btn btn-outline-secondary" title="restore">
                                                              <i class="mdi mdi-backup-restore"></i>
                                                            </a>
                                                            <a href="{{ route('loanReciveInstallment.delete',['id'=>$installment_trashed->id]) }}" class="btn btn-outline-secondary" title="delete forever">
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
                                        <th>Amount</th>
                                        <th>Amount Due</th>
                                        <th>Installment</th>
                                        <th>Payment Date</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loan_recive_installment_shidule as $loanRecive)
                                        <tr>
                                            <td>{{ $loanRecive->name }}</td>
                                            <td>{{ $loanRecive->email }}</td>
                                            <td>{{ $loanRecive->amount }} tk</td>
                                            <td>{{ $loanRecive->amount_due }} tk</td>
                                            <td>{{ $loanRecive->installment }}</td>
                                            <td>{{ $loanRecive->payment_date }}</td>
                                            <td>

                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('loanReciveInstallment.edit',['id'=>$loanRecive->id]) }}" class="btn btn-outline-secondary" title="Edit">
                                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                                  </a>
                                                <a href="{{ route('loanReciveInstallment.destroy',['id'=>$loanRecive->id]) }}" class="btn btn-outline-secondary" title="delete temp">
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
