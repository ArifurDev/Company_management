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
                            <h4 class="card-title">Empolyee Daily Report Edit</h4>
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

                            <form class="forms-sample" action="{{ route("update.empolyeereport",['id'=>$empolyees->id]) }}" method="POST">
                                @csrf
                              <div class="form-group" hidden>
                                <label for="exampleInputCompany">Company</label>
                                <input type="text" class="form-control text-light" id="exampleInputCompany" placeholder="Company Name" name="company" value="{{ $empolyees->company }}" >
                                {{-- <select
                                            class="form-control text-light"
                                            name="compony_name">
                                            <option value="{{ $comopany->compony_name }}">{{ $comopany->compony_name }}</option>
                                            @foreach ($comopanies as $comopany)
                                              <option value="{{ $comopany->compony_name }}">{{ $comopany->compony_name }}</option>
                                            @endforeach
                                        </select> --}}
                            </div>

                            <div class="form-group">
                                <label for="exampleInputIncoming">Incoming card</label>
                                <input type="number" class="form-control text-light" id="exampleInputIncoming" min="0" placeholder="Incoming card" name="incoming_card" value="{{ $empolyees->incoming_card }}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputIncoming">Incoming cash</label>
                                <input type="number" class="form-control text-light" id="exampleInputIncoming" min="0" placeholder="Incoming cash" name="incoming_cash" value="{{ $empolyees->incoming_cash }}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputIncoming">Outgoing</label>
                                <input type="number" class="form-control text-light" id="exampleInputIncoming" min="0" placeholder="Outgoing" name="outgoing" value="{{ $empolyees->outgoing }}">
                              </div>



                              <div class="form-group">
                                <label for="exampleTextarea1">Note</label>
                                <textarea class="form-control text-light" id="exampleTextarea1" rows="4" name="note">{{ $empolyees->note }}</textarea>
                              </div>
                              <button type="submit" class="btn btn-primary me-2">Update</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>
