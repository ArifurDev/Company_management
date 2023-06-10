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
                    <div class="row justify-content-center">
                        <h3 class="text-center">Company</h3>
                        <div class="col-md-4 border border-primary m-2">
                            @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session::get('success') }}

                            </div>
                        @endif
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                        <ul>
                                            <li>
                                                <p class="text-light">{{ $error }}</p>
                                            </li>
                                        </ul>
                                @endforeach
                            @endif
                            <form action="{{ route('company.store') }}" method="post">
                                @csrf
                                <div class="form-group pt-3">
                                    <div class="input-group ">
                                      <input type="text" class="form-control text-light"  placeholder="Enter Company Name" name="compony_name">
                                        <button class="btn btn-primary" type="submit">Create</button>
                                    </div>
                                  </div>
                            </form>
                        </div>


                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Companies</h4>
                                  <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th  class="text-light"> # </th>
                                          <th  class="text-light"> Company Name </th>
                                          <th  class="text-light">Action</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        @forelse ($comopanies as $company)
                                        <tr>
                                            <td  class="text-light">{{ $loop->iteration }}</td>
                                            <td  class="text-light"> {{ $company->compony_name }} </td>
                                            <td>
                                              <div class="btn-group" role="group" aria-label="Basic example">

                                                  <a href="{{ route('company.destroy',['id'=>$company->id]) }}" onclick="return confirm('are sure this company deleted forever')" class="btn btn-primary">
                                                    <i class="mdi mdi-delete"></i>
                                                  </a>
                                                </div>
                                            </td>
                                          </tr>
                                        @empty

                                        @endforelse

                                      </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">

                                        {{ $comopanies->links('pagination::bootstrap-5') }}
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
