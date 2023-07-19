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
                            <h4 class="card-title">Empolyee Salary </h4>
                            <div class="d-flex justify-content-between">
                                <p class="card-description"> Pay Date <code>{{ $date }}</code></p>

                            </div>
                            <table id="example" class="display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-light">Email</th>
                                        <th class="text-light">Company</th>
                                        <th class="text-light">Salary</th>
                                        <th class="text-light">Amount</th>
                                        <th class="text-light">Due</th>
                                        <th class="text-light">Payment Date</th>
                                        <th class="text-light">Payment Method</th>
                                        <th class="text-light">Payment Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salary_datiles as $datiles)
                                    <tr>
                                        <td class="text-light">{{ $datiles->email }}</td>
                                        <td class="text-light">{{ $datiles->company }}</td>
                                        <td class="text-light">{{ $datiles->salary }}</td>
                                        <td class="text-light">{{ $datiles->Amount }}</td>
                                        <td class="text-light">{{ $datiles->due }}</td>
                                        <td class="text-light">{{ $datiles->payment_date }}</td>
                                        <td class="text-light">{{ $datiles->payment_method }}</td>
                                        <td class="text-light">{{ $datiles->payment_type }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
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
