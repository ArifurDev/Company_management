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
                    {{-- <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th  class="text-light">Name</th>
                                            <th  class="text-light">Photo</th>
                                            <th  class="text-light">Salary Raised</th>
                                            <th  class="text-light">Salary Receivable</th>
                                            <th  class="text-light">Loan Taken</th>
                                            <th  class="text-light">Loan Repaid</th>
                                            <th  class="text-light">Visa Url</th>
                                            <th  class="text-light">Password</th>
                                            <th  class="text-light">Bank Name</th>
                                            <th  class="text-light">Bank Account Number</th>
                                            <th  class="text-light">Exchange Name</th>
                                            <th  class="text-light">Exchange Account Number</th>
                                            <th  class="text-light">Bank Card Number</th>
                                            <th  class="text-light">Pin</th>
                                            <th  class="text-light">Online Transfer Password</th>
                                            <th  class="text-light">A</th>
                                            <th  class="text-light">B</th>
                                            <th  class="text-light">C</th>
                                            <th  class="text-light">d</th>
                                            <th  class="text-light">E</th>
                                            <th  class="text-light">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($empolyeeinfo as $info)
                                         <tr>
                                            <td  class="text-light">{{ $info->email }}</td>
                                            <td  class="text-light"><img src="{{ asset('upload/empolyee_image') }}/{{ $info->photo }}" alt="" srcset=""> </td>
                                            <td  class="text-light">{{ $info->salary_raised }}</td>
                                            <td  class="text-light">{{ $info->salary_receivable }}</td>
                                            <td  class="text-light">{{ $info->loan_taken }}</td>
                                            <td  class="text-light">{{ $info->loan_repaid }}</td>
                                            <td  class="text-light">{{ $info->visa_url }}</td>
                                            <td  class="text-light">{{ $info->password }}</td>
                                            <td  class="text-light">{{ $info->bank_name }}</td>
                                            <td  class="text-light">{{ $info->bank_account_number }}</td>
                                            <td  class="text-light">{{ $info->exchange_name }}</td>
                                            <td  class="text-light">{{ $info->exchange_account_number }}</td>
                                            <td  class="text-light">{{ $info->bank_card_number }}</td>
                                            <td  class="text-light">{{ $info->Pin }}</td>
                                            <td  class="text-light">{{ $info->online_transfer_Password }}</td>
                                            <td  class="text-light">{{ $info->a }}</td>
                                            <td  class="text-light">{{ $info->b }}</td>
                                            <td  class="text-light">{{ $info->c }}</td>
                                            <td  class="text-light">{{ $info->d }}</td>
                                            <td  class="text-light">{{ $info->e }}</td>
                                            <td >


                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">

                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Empolyee Information</h4>
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
                                                      <tbody>
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

                                                              {{-- <form action="{{ route('empolyeeinfo.destroy',$trashed->id) }}" method="post">
                                                              @csrf
                                                              @method('DELETE')
                                                              <button type="submit" class="btn btn-outline-danger btn-fw">Delete</button>
                                                              </form> --}}
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

                            <div class="table-responsive">
                              <table class="table table-dark">
                                <thead>
                                  <tr>
                                        <th  class="text-light">Name</th>
                                        <th  class="text-light">Salary Raised</th>
                                        <th  class="text-light">Salary Receivable</th>
                                        <th  class="text-light">Loan Taken</th>
                                        <th  class="text-light">Loan Repaid</th>
                                        <th  class="text-light">Visa Url</th>
                                        <th  class="text-light">Password</th>
                                        <th  class="text-light">Bank Name</th>
                                        <th  class="text-light">Bank Account Number</th>
                                        <th  class="text-light">Exchange Name</th>
                                        <th  class="text-light">Exchange Account Number</th>
                                        <th  class="text-light">Bank Card Number</th>
                                        <th  class="text-light">Pin</th>
                                        <th  class="text-light">Online Transfer Password</th>
                                        <th  class="text-light">A</th>
                                        <th  class="text-light">B</th>
                                        <th  class="text-light">C</th>
                                        <th  class="text-light">d</th>
                                        <th  class="text-light">E</th>
                                        <th  class="text-light">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empolyeeinfo as $info)
                                    <tr>
                                       <td  class="text-light">{{ $info->email }}</td>
                                       <td  class="text-light">{{ $info->salary_raised }}</td>
                                       <td  class="text-light">{{ $info->salary_receivable }}</td>
                                       <td  class="text-light">{{ $info->loan_taken }}</td>
                                       <td  class="text-light">{{ $info->loan_repaid }}</td>
                                       <td  class="text-light">{{ $info->visa_url }}</td>
                                       <td  class="text-light">{{ $info->password }}</td>
                                       <td  class="text-light">{{ $info->bank_name }}</td>
                                       <td  class="text-light">{{ $info->bank_account_number }}</td>
                                       <td  class="text-light">{{ $info->exchange_name }}</td>
                                       <td  class="text-light">{{ $info->exchange_account_number }}</td>
                                       <td  class="text-light">{{ $info->bank_card_number }}</td>
                                       <td  class="text-light">{{ $info->Pin }}</td>
                                       <td  class="text-light">{{ $info->online_transfer_Password }}</td>
                                       <td  class="text-light">{{ $info->a }}</td>
                                       <td  class="text-light">{{ $info->b }}</td>
                                       <td  class="text-light">{{ $info->c }}</td>
                                       <td  class="text-light">{{ $info->d }}</td>
                                       <td  class="text-light">{{ $info->e }}</td>
                                       <td >
                                        <a href="{{ route('empolyeeinfo.edit',$info->id) }}" class="btn btn-outline-success btn-fw">Edit</a>

                                        <form action="{{ route('empolyeeinfo.destroy',$info->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-fw">Delete</button>
                                        </form>
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
                url:'{{URL::to('search')}}',
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
