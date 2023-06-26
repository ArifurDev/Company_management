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
                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('success'))
                                    <div class="alert alert-primary" role="alert">
                                        {{ session::get('success') }}
                                    </div>
                                @endif
                            <form class="form-sample"
                                action="{{ route('update.empolyee',['id'=>$empolyee->id]) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <p class="card-description">Edit Empolyee info </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control"
                                                    name="name" value="{{ $empolyee->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-3 col-form-label">Role</label>
                                            <div class="col-sm-9 ">
                                                <select
                                                    class="form-control text-light"
                                                    name="role">
                                                    <option value="admin" @selected($empolyee->role === 'admin')>Admin</option>
                                                    <option value="empolyees" @selected($empolyee->role === 'empolyees')>Empolyee</option>
                                                    <option value="assistant" @selected($empolyee->role === 'assistant')>Assistant</option>
                                                </select>
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
                                                    name="gender" required>
                                                    <option value="male" @selected($empolyee->gender === 'male')>Male </option>
                                                    <option value="female" @selected($empolyee->gender === 'female')>Female</option>
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
                                                    name="number" value="{{ $empolyee->number }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-3 col-form-label">Company</label>
                                            <div class="col-sm-9 ">
                                                <select class="form-control text-light" name="compony_name" required>
                                                    @foreach ($comopanies as $comopany)
                                                    <option value="{{ $comopany->compony_name }}" @selected($empolyee->compony_name === $comopany->compony_name)>{{ $comopany->compony_name }}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <button type="submit"
                                    class="btn btn-primary me-2">Ubdate</button>
                            </form>
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
