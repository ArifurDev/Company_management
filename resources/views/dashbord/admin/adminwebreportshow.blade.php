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
                                <h4 class="card-title">Site info</h4>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                                <input type="search" class="form-control text-light" name="search" id="search" placeholder="search here......">
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
                                                        <th  class="text-light"> Company </th>
                                                        <th  class="text-light"> Email </th>
                                                        <th  class="text-light"> Site Name </th>
                                                        <th  class="text-light"> URL </th>
                                                        <th  class="text-light"> U.N </th>
                                                        <th  class="text-light"> U.I </th>
                                                        <th  class="text-light"> Password </th>
                                                        <th  class="text-light"> Verifi Code </th>
                                                        <th  class="text-light"> Payment Date </th>
                                                        <th  class="text-light"> Save Date </th>
                                                        <th  class="text-light"> Acction </th>
                                                    </tr>
                                                </thead>

                                                    @foreach ($reportinfo_treshed as $treshed_info)
                                                    <tr>
                                                        <td  class="text-light"> {{ $treshed_info->company }} </td>
                                                        <td  class="text-light"> {{ $treshed_info->email }} </td>
                                                        <td  class="text-light"> {{ $treshed_info->site_name }} </td>
                                                        <td  class="text-light"> {{ $treshed_info->url }} </td>
                                                        <td  class="text-light"> {{ $treshed_info->user_name }} </td>
                                                        <td  class="text-light"> {{ $treshed_info->user_id }} </td>
                                                        <td  class="text-light"> {{ $treshed_info->password }} </td>
                                                        <td  class="text-light"> {{ $treshed_info->verifi_code }} </td>
                                                        <td  class="text-light"> {{ $treshed_info->payment_date }} </td>
                                                        <td  class="text-light"> {{ $treshed_info->created_at->format('d/m/Y')}}</td>
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

                                        <th  class="text-light"> Company </th>
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

                                        @foreach ($reportinfo as $info)
                                        <tr>
                                            <td  class="text-light"> {{ $info->company }} </td>
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
                                                    <a type="button" class="btn btn-primary" href="{{ route('view.adminwebreport',['id'=>$info->id]) }}" title="single view">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
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
