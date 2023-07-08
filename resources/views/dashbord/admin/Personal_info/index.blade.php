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
                              <div class="card-body">
                                <h4 class="card-title">Show Admin Site info</h4>
                                <div class="table-responsive">
                                  <table class="table table-dark">
                                    <thead>
                                      <tr>
                                        <th  class="text-light"> Email </th>
                                        <th  class="text-light"> Site Name </th>
                                        <th  class="text-light"> URL </th>
                                        <th  class="text-light"> U.N </th>
                                        <th  class="text-light"> U.I </th>
                                        <th  class="text-light"> Password </th>
                                        <th  class="text-light"> Why create </th>
                                        <th  class="text-light"> Number </th>
                                        <th  class="text-light"> Verifi Code </th>
                                        <th  class="text-light"> Note </th>
                                        <th  class="text-light"> Payment Date </th>
                                        <th  class="text-light"> Save Date </th>
                                        <th  class="text-light"> Acction </th>
                                      </tr>
                                    </thead>

                                    <tbody class="alldata">

                                        @foreach ($personal_info as $info)
                                        <tr>
                                            <td  class="text-light"> {{ $info->email }} </td>
                                            <td  class="text-light"> {{ $info->site_name }} </td>
                                            <td  class="text-light"> {{ $info->url }} </td>
                                            <td  class="text-light"> {{ $info->user_name }} </td>
                                            <td  class="text-light"> {{ $info->user_id }} </td>
                                            <td  class="text-light"> {{ $info->password }} </td>
                                            <td  class="text-light"> {{ $info->why_create }} </td>
                                            <td  class="text-light"> {{ $info->number }} </td>
                                            <td  class="text-light"> {{ $info->verifi_code }} </td>
                                            <td  class="text-light"> {{ $info->note }} </td>
                                            <td  class="text-light"> {{ $info->payment_date }} </td>
                                            <td  class="text-light"> {{ $info->created_at->format('d/m/Y')}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" class="btn btn-primary" href="{{ route('personalinfo.edit',$info->id) }}" title="edit">
                                                        <i class="mdi mdi-border-color"></i>
                                                    </a>

                                                    <a type="button" class="btn btn-danger" title="Delete Forever" href="{{ route('personalinfo.destroy',$info->id) }}" >
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    @include('dashbord.allscript')
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>
