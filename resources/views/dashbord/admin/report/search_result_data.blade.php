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


                                <h4 class="card-title">Admin Daily Report Search Result.........</h4>


                                 <!-- Large Modal -->

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
                                        <th> Total </th>
                                        <th> Date </th>
                                        <th> Action </th>
                                      </tr>
                                    </thead>
                                    @php
                                        $total_outgoing = 0;
                                    @endphp
                                    <tbody class="alldata">
                                        @foreach ($search_result_data as $result_data)
                                        <tr>
                                            <td> {{ $result_data->house_rent }} tk</td>
                                            <td> {{ $result_data->gard_bill }} tk</td>
                                            <td> {{ $result_data->electricity_bill }} tk</td>
                                            <td> {{ $result_data->sewerage_bill }} tk</td>
                                            <td> {{ $result_data->expanse }} tk</td>
                                            <td> {{ $result_data->personal }} tk</td>
                                            <td> {{ $result_data->total }} tk</td>
                                            <td> {{ $result_data->created_at->format('d/m/Y')}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <a type="button" class="btn btn-primary" href="{{ route('admindailyraport.edit',['id'=>$result_data->id]) }}" title="edit">
                                                        <i class="mdi mdi-border-color"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-primary" href="{{ route('admindailyraport.destroy',['id'=>$result_data->id]) }}" title="delete tem">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                            </div></td>
                                            @php
                                                $total_outgoing = $total_outgoing + $result_data->total;
                                            @endphp
                                          </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>T.Cost={{ $total_outgoing }} tk</td>
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
