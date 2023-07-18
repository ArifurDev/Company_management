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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Empolyee Information</h4>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#largeModal">
                                    Trashed Bin
                                 </button>
                            </div>
                            <!-- Large Modal -->
                                <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content  bg-dark">
                                            <div class="modal-header ">
                                                <h5 class="modal-title" id="exampleModalLabel3">Create a New Empolyees
                                                </h5>
                                                <button
                                                    type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body m-1">
                                                <div class="table-responsive">
                                                    <table class="table table-dark">
                                                      <thead>
                                                        <tr>
                                                              <th  class="text-light">Name</th>
                                                              <th  class="text-light">Salary Raised</th>
                                                              <th  class="text-light">Salary Receivable</th>
                                                              <th  class="text-light">Loan Taken</th>
                                                              <th  class="text-light">Loan Repaid</th>
                                                              <th  class="text-light">Action</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody class="alldata">
                                                           @foreach ($trashed_info as $trashed)
                                                          <tr>
                                                             <td  class="text-light">{{ $trashed->email }}</td>
                                                             <td  class="text-light">{{ $trashed->salary_raised }}</td>
                                                             <td  class="text-light">{{ $trashed->salary_receivable }}</td>
                                                             <td  class="text-light">{{ $trashed->loan_taken }}</td>
                                                             <td  class="text-light">{{ $trashed->loan_repaid }}</td>

                                                             <td >
                                                              <a href="{{ route('empolyee.info.restore',$trashed->id) }}" class="btn btn-outline-success btn-fw">Restore</a>
                                                              <a href="{{ route('empolyee.info.delete',$trashed->id) }}" class="btn btn-outline-danger btn-fw">Delete</a>


                                                             </td>

                                                         </tr>
                                                         @endforeach
                                                      </tbody>

                                                      <tbody id="Content" class="searchdata">

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
                                            <th  class="text-light">Email</th>
                                            <th  class="text-light">Empolyee Salary</th>
                                            <th  class="text-light">Bank Name</th>
                                            <th  class="text-light">Bank Account Number</th>
                                            <th  class="text-light">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($empolyeeinfo as $info)
                                        <tr>
                                           <td  class="text-light">{{ $info->email }}</td>
                                           <td  class="text-light">{{ $info->empolyee_salary }}</td>
                                           <td  class="text-light">{{ $info->bank_name }}</td>
                                           <td  class="text-light">{{ $info->bank_account_number }}</td>
                                           <td >
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('empolyeeinfo.show',$info->id) }}" class="btn btn-outline-success" title="view"><i class="mdi mdi-eye"></i></a>
                                                <a href="{{ route('empolyeeinfo.edit',$info->id) }}" class="btn btn-outline-success "><i class="mdi mdi-pencil"></i></a>
                                                <form action="{{ route('empolyeeinfo.destroy',$info->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger"><i class="mdi mdi-delete"></i></button>
                                                </form>
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
