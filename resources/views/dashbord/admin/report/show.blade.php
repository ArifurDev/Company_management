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
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                @if (Session::has('success'))
                                    <div class="alert alert-primary" role="alert">
                                        {{ session::get('success') }}
                                    </div>
                                @endif
                              <div class="card-body">


                                <h4 class="card-title">Admin Daily Report</h4>
                                <form action="{{ route('admindailyraport.datasearch') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">From</label>
                                                <div class="col-sm-9 ">
                                                    <input type="date" class="form-control" id="" name="fromdate">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">To</label>
                                                <div class="col-sm-9 ">
                                                    <input type="date" class="form-control" id=""name="today">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary">Filter</button>
                                        </div>


                                    </div>
                                  </form>
                                <div class="d-flex justify-content-end align-items-center">



                                    {{--  --}}
                                    <button type="button" class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#largeModal">
                                       Trash Bin
                                     </button>
                                </div>
                                 <!-- Large Modal -->
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
                                                        <th> House Rent </th>
                                                        <th> Gard Bill </th>
                                                        <th> Electricity Bill </th>
                                                        <th> Sewerage Bill </th>
                                                        <th> Expanse </th>
                                                        <th> Personal </th>
                                                        <th> Loan </th>
                                                        <th> Total </th>
                                                        <th> Date </th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>

                                                    @foreach ($adminriports_onlyTrashed as $treshed_info)
                                                    <tr>
                                                        <td> {{ $treshed_info->house_rent }} tk</td>
                                                        <td> {{ $treshed_info->gard_bill }} tk</td>
                                                        <td> {{ $treshed_info->electricity_bill }} tk</td>
                                                        <td> {{ $treshed_info->sewerage_bill }} tk</td>
                                                        <td> {{ $treshed_info->expanse }} tk</td>
                                                        <td> {{ $treshed_info->personal }} tk</td>
                                                        <td> {{ $treshed_info->loan }} tk</td>
                                                        <td> {{ $treshed_info->total }} tk</td>
                                                        <td> {{ $treshed_info->created_at->format('d/m/Y')}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                                <a type="button" class="btn btn-primary" href="{{ route('admindailyraport.restor',['id'=>$treshed_info->id]) }}" title="restore">
                                                                    <i class="mdi mdi-backup-restore"></i>
                                                                </a>
                                                                <a type="button" class="btn btn-primary" href="{{ route('admindailyraport.delete',['id'=>$treshed_info->id]) }}" title="delete forever">
                                                                    <i class="mdi mdi-delete-forever"></i>
                                                                </a>
                                                        </div></td>

                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>

                                        </div>

                                    </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                  <table class="table table-dark">
                                    <thead>
                                      <tr>
                                        <th> House Rent </th>
                                        <th> Gard Bill </th>
                                        <th> Electricity Bill </th>
                                        <th> Sewerage Bill </th>
                                        <th> Expanse </th>
                                        <th> Personal </th>
                                        <th> Loan </th>
                                        <th> Total </th>
                                        <th> Date </th>
                                        <th> Action </th>
                                      </tr>
                                    </thead>
                                    <tbody class="alldata">
                                        @foreach ($adminriports as $info)
                                        <tr>
                                            <td> {{ $info->house_rent }} tk</td>
                                            <td> {{ $info->gard_bill }} tk</td>
                                            <td> {{ $info->electricity_bill }} tk</td>
                                            <td> {{ $info->sewerage_bill }} tk</td>
                                            <td> {{ $info->expanse }} tk</td>
                                            <td> {{ $info->personal }} tk</td>
                                            <td> {{ $info->loan }} tk</td>
                                            <td> {{ $info->total }} tk</td>
                                            <td> {{ $info->created_at->format('d/m/Y')}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <a type="button" class="btn btn-primary" href="{{ route('admindailyraport.edit',['id'=>$info->id]) }}" title="edit">
                                                        <i class="mdi mdi-border-color"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-primary" href="{{ route('admindailyraport.destroy',['id'=>$info->id]) }}" title="delete tem">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                            </div></td>

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
