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
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Empolyees</h4>
                                @if (Session::has('success'))
                                    <div class="alert alert-primary" role="alert">
                                        {{ session::get('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                     <ul>
                                                        <li >
                                                             <p class="text-light">{{ $error }}
                                                            </p>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                             @endif
                                <div class="d-flex justify-content-between align-items-center">
                                    {{-- user add --}}

                                    {{-- add user end button --}}
                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                                        data-bs-target="#largeModal">
                                        <i class="mdi mdi-account d-block mb-1"> Add</i>
                                    </button>


                                        <div class="col-md-4">
                                            <div class="form-group row">


                                        <div class="col-sm-9">
                                                    <input type="search" class="form-control text-light" name="search" id="search" placeholder="search here......">
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                {{-- user add forme --}}

                                {{-- user add forme end --}}
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
                                                <div class="table-responsive text-nowrap">
                                                    <div class="col-12 grid-margin">
                                                        <div class="card">

                                                            <div class="card-body">

                                                                <form class="form-sample"
                                                                    action="{{ route('store.empolyee') }}"
                                                                    enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    <p class="card-description"> Personal info </p>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label">Name</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"
                                                                                        class="form-control text-light"
                                                                                        name="name" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label">Email</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="email"
                                                                                        class="form-control text-light"
                                                                                        name="email" >
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label">Gender</label>
                                                                                <div class="col-sm-9 ">
                                                                                    <select
                                                                                        class="form-control text-light"
                                                                                        name="gender" >
                                                                                        <option value="male">Male
                                                                                        </option>
                                                                                        <option value="female">Female
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label">Number</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"
                                                                                        class="form-control text-light"
                                                                                        name="number" >
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">

                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label">Role</label>
                                                                                <div class="col-sm-9 ">
                                                                                    <select
                                                                                        class="form-control text-light"
                                                                                        name="role">
                                                                                        <option value="admin">Admin
                                                                                        </option>
                                                                                        <option value="empolyees">
                                                                                            Empolyee</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label">Company</label>
                                                                                <div class="col-sm-9 ">
                                                                                    <select
                                                                                        class="form-control text-light"
                                                                                        name="compony_name">
                                                                                        <option >Select company name</option>
                                                                                        @foreach ($comopanies as $comopany)
                                                                                          <option value="{{ $comopany->compony_name }}">{{ $comopany->compony_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <button type="submit"
                                                                        class="btn btn-primary me-2">Create</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">

                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th  class="text-light">Company </th>
                                                <th  class="text-light">Name </th>
                                                <th  class="text-light">Email</th>
                                                <th  class="text-light">Role</th>
                                                <th  class="text-light">Number</th>
                                                <th  class="text-light">Created at </th>
                                                <th  class="text-light">Acction</th>
                                            </tr>
                                        </thead>

                                        <tbody class="alldata">
                                            @foreach ($empolyee as $empolyees)


                                            <tr>
                                                <td  class="text-light"> {{ $empolyees->compony_name }} </td>
                                                <td  class="text-light"> {{ $empolyees->name }} </td>
                                                <td  class="text-light"> {{ $empolyees->email }}</td>
                                                <td  class="text-light"> {{ $empolyees->role }}</td>
                                                <td  class="text-light"> {{ $empolyees->number }}</td>
                                                <td  class="text-light"> {{ $empolyees->created_at->format('d/m/Y') }}  {{ $empolyees->created_at->format('g:i A') }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a type="button" title="edit" class="btn btn-primary" href="{{ route('edit.empolyee',['id'=>$empolyees->id]) }}">
                                                            <i class="mdi mdi-border-color"></i>
                                                        </a>

                                                        <form action="{{ route('delete.empolyee',['id'=>$empolyees->id]) }}" method="post" onclick="return confirm('are sure delete forever')">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary" title="delete forever" >
                                                                <i class="mdi mdi-delete"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach


                                        </tbody>
                                        <tbody id="Content" class="searchdata"></tbody>


                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {!! $empolyee->links('pagination::simple-bootstrap-4') !!}
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
