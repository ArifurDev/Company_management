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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Empolyee Salary</h4>
                            <div class="d-flex justify-content-between">
                                <p class="card-description"> important <code>.document</code></p>
                                <p class="card-description"> Payment Date <code>{{ $prev }} </code></p>
                            </div>
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th class="text-light"> # </th>
                                    <th class="text-light"> Information </th>
                                    <th class="text-light"> Salary </th>
                                    <th class="text-light">  Mondth </th>
                                     <th class="text-light">  Payment Status </th>
                                    <th class="text-light">  Action </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empolyee as $empolyee_info)
                                    <tr>
                                        <td> {{ $loop->iteration  }} </td>
                                        <td>
                                            <ul class="list-arrow">
                                                <li ><span>Company: {{ $empolyee_info->compony_name }}</span></li>
                                                <li class="mt-1"><span>Email: {{ $empolyee_info->email }}</span></li>
                                                <li class="mt-1"><span>Phone Number:{{ $empolyee_info->number }}</span></li>
                                                <li class="mt-1"><span>Bank Name: {{ $empolyee_info->bank_name }}</span></li>
                                                <li class="mt-1"><span>Bank Account Number: {{ $empolyee_info->bank_account_number }}</span></li>
                                              </ul>
                                        </td>
                                        <td><label class="badge badge-info">{{ $empolyee_info->empolyee_salary }}</label></td>
                                        <td>{{ $prev }}</td>
                                        <td>@if ($prev_full_date == $empolyee_info->pay_date)
                                            <label class="badge badge-success">Paid</label>
                                        @else
                                            <label class="badge badge-danger">Unpaid</label>
                                        @endif</td>
                                        <td>
                                            <a href="{{ route('monthly.payment',['email'=> $empolyee_info->email] ) }}" class="btn btn-primary">Pay</a>

                                            <a href="{{ route('monthly.payment',['email'=> $empolyee_info->email] ) }}" class="btn btn-primary"><i class="mdi mdi-printer"></i></a>
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

    <!-- ajax code -->



</body>

</html>
