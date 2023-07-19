<!DOCTYPE html>
<html lang="en">

<head>
    {{-- all link --}}
    @include('dashbord.headerlink')


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>
<style>
    option{
        background: black;
    }
</style>
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
                                <h4 class="card-title">Empolyees Reports</h4>
                                  {{-- date search form --}}
                                  <form action="{{ route('datesearch.empolyeereport') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">From</label>
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
                                <div class="d-flex justify-content-between align-items-center">

                                    {{--  --}}
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#largeModal">
                                       Trash Bin
                                     </button>
                                </div>


                                <div class="d-flex justify-content-end align-items-center p-1">
                                      <div class="dropdown">
                                        <button type="button" class="btn btn-outline-info dropdown-toggle" id="dropdownMenuIconButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Download Report <i class="mdi mdi-briefcase-download"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton3" style="">
                                            <a href="{{ route('all.export.empolyeereport') }}" class="btn btn-danger mb-2">All Reports</a>
                                            <a href="{{ route('export.empolyeereport') }}" class="btn btn-primary">This Month reports</a>
                                        </div>
                                      </div>
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

                                                        <th class="text-light"> Company </th>
                                                        <th class="text-light"> Empolyee Email </th>
                                                        <th class="text-light"> Incoming Card</th>
                                                        <th class="text-light"> Incoming Cash</th>
                                                        <th class="text-light"> Incoming </th>
                                                        <th class="text-light"> Outgoing </th>
                                                        <th class="text-light"> Cash </th>
                                                        <th class="text-light"> Deleted at </th>
                                                        <th class="text-light"> Acction </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @foreach ($empolyeereport_onlyTrashed as $empolyeereport_Trashed)
                                                    <tr>
                                                        <td class="text-light"> {{ $empolyeereport_Trashed->company }} </td>
                                                        <td class="text-light"> {{ $empolyeereport_Trashed->empolyee }} </td>
                                                        <td class="text-light"> {{ $empolyeereport_Trashed->incoming_card }} tk</td>
                                                        <td class="text-light"> {{ $empolyeereport_Trashed->incoming_cash }} tk</td>
                                                        <td class="text-light"> {{ $empolyeereport_Trashed->incoming }} tk</td>
                                                        <td class="text-light"> {{ $empolyeereport_Trashed->outgoing }} tk</td>
                                                        <td class="text-light"> {{ $empolyeereport_Trashed->cash }} tk</td>
                                                        <td class="text-light"> {{ $empolyeereport_Trashed->deleted_at->format('d/m/Y') }} </td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a type="button" class="btn btn-primary"  href="{{ route('restor.empolyeereport',['id'=>$empolyeereport_Trashed->id]) }}" title="restore">
                                                                    <i class="mdi mdi-backup-restore"></i>
                                                                </a>
                                                                <a type="button" class="btn btn-primary" title="delete forever" href="{{ route('delete.empolyeereport',['id'=>$empolyeereport_Trashed->id]) }}" title="restore">
                                                                    <i class="mdi mdi-delete-forever"></i>
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
                                <table id="example" class="display responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-light"> Company </th>
                                            <th class="text-light"> Empolyee Email </th>
                                            <th class="text-light"> Incoming Card</th>
                                            <th class="text-light"> Incoming Cash</th>
                                            <th class="text-light"> Incoming </th>
                                            <th class="text-light"> Outgoing </th>
                                            <th class="text-light"> Cash </th>
                                            <th class="text-light"> Date </th>
                                            <th class="text-light"> Note </th>
                                            <th class="text-light"> Acction </th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($empolyees as $empolyee)
                                        <tr>
                                            <td class="text-light"> {{ $empolyee->company }} </td>
                                            <td class="text-light"> {{ $empolyee->empolyee }} </td>
                                            <td class="text-light"> {{ $empolyee->incoming_card }} tk</td>
                                            <td class="text-light"> {{ $empolyee->incoming_cash }} tk</td>
                                            <td class="text-light"> {{ $empolyee->incoming }} tk</td>
                                            <td class="text-light"> {{ $empolyee->outgoing }} tk</td>
                                            <td class="text-light">  {{ $empolyee->cash }} tk</td>
                                            <td class="text-light">{{ $empolyee->created_at->format('d/m/Y') }}  </td>
                                            <td class="text-light">{{ $empolyee->note }}  </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="{{ route('details.empolyeereport',['id'=>$empolyee->id]) }}" title="details">
                                                        <i class="mdi mdi-account-card-details"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-primary" href="{{ route('edit.empolyeereport',['id'=>$empolyee->id]) }}" title="edit">
                                                        <i class="mdi mdi-border-color"></i>
                                                    </a>

                                                    <form action="{{ route('destroy.empolyeereport',['id'=>$empolyee->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary" title="delete tmp">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                    </form>
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
    <script type="text/javascript">
       $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

</body>

</html>
