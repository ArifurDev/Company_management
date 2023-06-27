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

                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Loan Installment</h4>
                              @if ($errors->any())
                              @foreach ($errors->all() as $error)
                                      <ul>
                                          <li>
                                              <p class="text-light">{{ $error }}</p>
                                          </li>
                                      </ul>
                              @endforeach
                             @endif


                             <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title"><img width="10%" src="{{ asset('upload/loan_image') }}/{{ $main_loan_info->image }}" alt=""></h4>
                                  <p class="card-description"> Name <code>&lt;{{ $main_loan_info->name }}&gt;</code>  </p>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <address>
                                        <p> Phone: {{ $main_loan_info->phone }}</p>
                                        <p> Email: {{ $main_loan_info->email }} </p>
                                        <p>Status: <label class="badge badge-danger"> {{ $main_loan_info->status }}</label></p>
                                        <p>Loan Type: <label class="badge badge-primary mt-2"> {{ $main_loan_info->loan_type }}</label></p>
                                      </address>
                                    </div>
                                    <div class="col-md-6">
                                      <address >
                                        <p> Amount: {{ $main_loan_info->amount }}</p>
                                        <p> Installment: {{ $main_loan_info->installment }} </p>
                                        <p> Per Installment: {{ $main_loan_info->per_installment }} </p>
                                        <p> Payment Date: {{ $main_loan_info->payment_date }} </p>

                                        <p> Pay installment : {{ $installment_count }} </p>

                                      </address>

                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="d-flex justify-content-between m-2">
                                <p class="card-description"> Pay Loan <code>installment</code></p>
                                <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#largeModal">
                                    Trashed Bin
                                 </button>
                              </div>
                              <!-- Large Modal -->
                              <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content  bg-dark">
                                        <div class="modal-header ">
                                            <h5 class="modal-title" id="exampleModalLabel3">Loan Installment
                                            </h5>
                                            <button
                                                type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-1">
                                            <div class="table-responsive">
                                                <table class="table table-dark">
                                                  <thead>
                                                    <tr>
                                                        <th>Main Loan Id</th>
                                                        <th>Installment</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($Trashed_installment as $Trashed_item)
                                                    <tr>
                                                    <td>{{ $Trashed_item->mainloan_id }}</td>
                                                    <td>{{ $Trashed_item->installment }}</td>
                                                    <td>{{ $Trashed_item->amount }}</td>
                                                    <td>{{ $Trashed_item->date }}</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-danger"> <i class="mdi mdi-delete"></i></button>
                                                    </td>
                                                      <td>
                                                          <div class="btn-group" role="group" aria-label="Basic example">
                                                              <a href="{{ route('loandetaile.restore',$Trashed_item->id) }}" type="button" class="btn btn-primary" title="show">
                                                                <i class="mdi mdi-restore"></i>
                                                              </a>
                                                              <a href="{{ route('loandetaile.delete',$Trashed_item->id) }}" class="btn btn-primary" title="edit">
                                                                <i class="mdi mdi-delete-forever"></i>
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

                              <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Main Loan Id</th>
                                      <th>Installment</th>
                                      <th>Amount</th>
                                      <th>Date</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                    @php
                                        $total_amount = 0;
                                    @endphp
                                  <tbody>
                                      @foreach ($loan_installment as $installment)
                                        <tr>
                                          <td>{{ $installment->mainloan_id }}</td>
                                          <td>{{ $installment->installment }}</td>
                                          <td>{{ $installment->amount }}</td>
                                          <td>{{ $installment->date }}</td>
                                          <td>
                                            <a href="{{ route('loandetaile.destroy',$installment->id) }}" class="btn btn-danger"> <i class="mdi mdi-delete"></i></a>
                                          </td>
                                        </tr>
                                        @php
                                                $total_amount = $total_amount + $installment->amount;
                                         @endphp
                                      @endforeach
                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total = {{ $total_amount }}</td>
                                        <td></td>
                                        <td></td>
                                      </tr>
                                  </tbody>
                                </table>
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
