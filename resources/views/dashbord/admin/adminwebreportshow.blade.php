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
                                <h4 class="card-title">Site info</h4>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                                <input type="search" class="form-control" name="search" id="search" placeholder="search here......">
                                            </div>
                                        </div>
                                    </div>


                                    {{--  --}}
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#largeModal">
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
                                                        <th> Company </th>
                                                        <th> Email </th>
                                                        <th> Site Name </th>
                                                        <th> URL </th>
                                                        <th> U.N </th>
                                                        <th> U.I </th>
                                                        <th> Password </th>
                                                        <th> Verifi Code </th>
                                                        <th> Payment Date </th>
                                                        <th> Save Date </th>
                                                        <th> Acction </th>
                                                    </tr>
                                                </thead>

                                                    @foreach ($reportinfo_treshed as $treshed_info)
                                                    <tr>
                                                        <td> {{ $treshed_info->company }} </td>
                                                        <td> {{ $treshed_info->email }} </td>
                                                        <td> {{ $treshed_info->site_name }} </td>
                                                        <td> {{ $treshed_info->url }} </td>
                                                        <td> {{ $treshed_info->user_name }} </td>
                                                        <td> {{ $treshed_info->user_id }} </td>
                                                        <td> {{ $treshed_info->password }} </td>
                                                        <td> {{ $treshed_info->verifi_code }} </td>
                                                        <td> {{ $treshed_info->payment_date }} </td>
                                                        <td> {{ $treshed_info->created_at->format('d/m/Y')}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                                <a type="button" class="btn btn-primary" href="{{ route('restor.adminwebreport',['id'=>$treshed_info->id]) }}" title="restore">
                                                                    <i class="mdi mdi-backup-restore"></i>
                                                                </a>
                                                                <a type="button" class="btn btn-primary" href="{{ route('delete.adminwebreport',['id'=>$treshed_info->id]) }}" title="delete forever">
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

                                        <th> Company </th>
                                        <th> Email </th>
                                        <th> Site Name </th>
                                        <th> URL </th>
                                        <th> U.N </th>
                                        <th> U.I </th>
                                        <th> Password </th>
                                        <th> Why create </th>
                                        <th> Number </th>
                                        <th> Verifi Code </th>
                                        <th> Note </th>
                                        <th> Payment Date </th>
                                        <th> Save Date </th>
                                        <th> Acction </th>
                                      </tr>
                                    </thead>

                                    <tbody class="alldata">

                                        @foreach ($reportinfo as $info)
                                        <tr>
                                            <td> {{ $info->company }} </td>
                                            <td> {{ $info->email }} </td>
                                            <td> {{ $info->site_name }} </td>
                                            <td> {{ $info->url }} </td>
                                            <td> {{ $info->user_name }} </td>
                                            <td> {{ $info->user_id }} </td>
                                            <td> {{ $info->password }} </td>
                                            <td> {{ $info->why_create }} </td>
                                            <td> {{ $info->number }} </td>
                                            <td> {{ $info->verifi_code }} </td>
                                            <td> {{ $info->note }} </td>
                                            <td> {{ $info->payment_date }} </td>
                                            <td> {{ $info->created_at->format('d/m/Y')}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <a type="button" class="btn btn-primary" href="{{ route('adminwebreport.edit',['id'=>$info->id]) }}" title="edit">
                                                        <i class="mdi mdi-border-color"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-primary" href="{{ route('adminwebreport.destroy',['id'=>$info->id]) }}" title="delete tem">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                            </div></td>

                                          </tr>
                                        @endforeach
                                        <tbody id="Content" class="searchdata"></tbody>   {{--   live search result show this table--}}
                                    </tbody>


                                  </table>
                                  <div class="d-flex justify-content-center mt-3">

                                    {{ $reportinfo->links('pagination::bootstrap-5') }}
                                </div>
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

    {{-- live search js code --}}
    <script type="text/javascript">

        $('#search').on('keyup',function()
        {

         $value=$(this).val();

         if($value)
         {
             $('.alldata').hide();
             $('.searchdata').show();
         }else
         {
             $('.alldata').show();
             $('.searchdata').hide();
         }

         $.ajax({
                 type:'get',
                 url:'{{URL::to('adminwebreportsearch')}}',
                 data:{'search':$value},
                 success:function(data)
                 {
                     console.log(data);
                     $('#Content').html(data);
                 }
             });

         });
     </script>
</body>

</html>
