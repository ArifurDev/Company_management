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
                            <h4 class="card-title">site info save</h4>
                            <div class="card-description ">

                                <p>Please fill the form correctly!</p>
                            </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-primary" role="alert">
                                        {{ session::get('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <ul>
                                            <li>
                                                <p class="text-light">{{ $error }}
                                                </p>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif

                            <form class="forms-sample" action="{{ route("adminwebreport.store") }}" method="POST">
                                @csrf
                              <div class="form-group">
                                <label for="site_name">Site Name</label>
                                <input type="text" class="form-control text-light" id="site_name" placeholder="site_name" name="site_name">
                              </div>
                              <div class="form-group">
                                <label for="url">URL</label>
                                <input type="url" class="form-control text-light" id="url" placeholder="url" name="url">
                              </div>
                              <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" class="form-control text-light" id="user_name" placeholder="user_name" name="user_name">
                              </div>
                              <div class="form-group">
                                <label for="user_id">User Id</label>
                                <input type="number" class="form-control text-light" id="user_id" placeholder="user_id" name="user_id">
                              </div>
                              <div class="form-group">
                                <label for="password">Passeord</label>
                                <input type="text" class="form-control text-light" id="password" placeholder="password" name="password">
                              </div>
                              <div class="form-group">
                                <label for="verifi_code">Verification Code</label>
                                <input type="number" class="form-control text-light" id="verifi_code" placeholder="verifi_code" name="verifi_code">
                              </div>
                              <div class="form-group">
                                <label for="payment_date">Payment Date</label>
                                <input type="date" class="form-control text-light" id="payment_date" placeholder="payment_date" name="payment_date">
                              </div>

                              <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
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



</body>

</html>
