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
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="card-title">Loan information</h4>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-description"> Complete <code>Documents</code></p>
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
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>image</th>
                                                            <th>Amount</th>
                                                            <th>Install</th>
                                                            <th>Per Install</th>
                                                            <th>Type</th>
                                                            <th>Payment Date</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        @foreach ($onlyTrashed as $Trashed_item)
                                                        <tr>
                                                          <td>{{ $Trashed_item->name }}</td>
                                                          <td>{{ $Trashed_item->Email }}</td>
                                                          <td>{{ $Trashed_item->phone }}</td>
                                                          <td><img src="{{ asset('upload/loan_image') }}/{{ $Trashed_item->image }}" alt=""></td>
                                                          <td>{{ $Trashed_item->amount }}</td>
                                                          <td>{{ $Trashed_item->installment }}</td>
                                                          <td>{{ $Trashed_item->per_installment }}</td>
                                                          <td><label class="badge badge-primary">{{ $Trashed_item->loan_type }}</label></td>
                                                          <td>{{ $Trashed_item->payment_date }}</td>
                                                          <td><label class="badge badge-danger">{{ $Trashed_item->status }}</label></td>
                                                          <td>
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                  <a href="{{ route('mainloan.restor',$Trashed_item->id) }}" type="button" class="btn btn-primary" title="show">
                                                                    <i class="mdi mdi-restore"></i>
                                                                  </a>
                                                                  <a href="{{ route('mainloan.delete',$Trashed_item->id) }}" class="btn btn-primary" title="edit">
                                                                    <i class="mdi mdi-delete-forever"></i>
                                                                  </a>
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
                                </div>
                                <table id="example" class="display responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>image</th>
                                            <th>Amount</th>
                                            <th>Install</th>
                                            <th>Per Install</th>
                                            <th>Type</th>
                                            <th>Payment Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loan_information as $item)
                                          <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->Email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td><img width="50" src="@if($item->image == null ) {{ asset('upload/loan_image') }}/{{ "demo.png" }} @else {{ asset('upload/loan_image') }}/{{ $item->image }} @endif" alt=""></td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->installment }}</td>
                                            <td>{{ $item->per_installment }}</td>
                                            <td><label @if ($item->loan_type === 'send')
                                                class="badge badge-primary"
                                            @else
                                                class="badge badge-danger"
                                            @endif>{{ $item->loan_type }}</label></td>
                                            <td>{{ $item->payment_date }}</td>
                                            <td><label class="badge badge-primary">{{ $item->status }}</label></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('download.pdf',$item->id) }}" type="button" class="btn btn-danger" title="download">
                                                        <i class="mdi mdi-printer"></i>
                                                      </a>
                                                    <a href="{{ route('loaninstallment.show',$item->id) }}" type="button" class="btn btn-primary" title="show">
                                                      <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    {{-- tepm delete main loan selected user information --}}
                                                    <form action="{{ route('mainloan.destroy',$item->id) }}" method="post" title="delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button  type="submit" class="btn btn-primary" >
                                                            <i class="mdi mdi-delete"></i>
                                                          </button>
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
