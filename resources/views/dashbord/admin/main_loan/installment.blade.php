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



                              <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Main Loan Id</th>
                                      <th>Installment</th>
                                      <th>Amount</th>
                                      <th>Date</th>
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
