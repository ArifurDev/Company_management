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

                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Loan Managment</h4>
                              @if ($errors->any())
                              @foreach ($errors->all() as $error)
                                      <ul>
                                          <li>
                                              <p class="text-light">{{ $error }}</p>
                                          </li>
                                      </ul>
                              @endforeach
                             @endif
                              <form class="forms-sample" action="{{ route('mainloan.update',$mainloan->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control text-light" id="exampleInputUsername2" placeholder="Enter Name" name="name" value="{{ $mainloan->name }}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                  <div class="col-sm-9">
                                    <input type="email" class="form-control text-light" id="exampleInputEmail2" placeholder="Enter Email" name="email" value="{{ $mainloan->email }}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="exampleInputMobile" class="col-sm-3 col-form-label">Phone</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control text-light" id="exampleInputMobile" placeholder="Enter Phone number" name="phone" value="{{ $mainloan->phone }}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="amount" placeholder="Enter Amount" name="amount" value="{{ $mainloan->amount }}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="installment" class="col-sm-3 col-form-label">Installment</label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control text-light" id="installment" placeholder="Enter Installment" name="installment" min="1" value="{{ $mainloan->installment }}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="loan_type" class="col-sm-3 col-form-label">Loan Type</label>
                                    <div class="col-sm-9">
                                        <select name="loan_type" class="form-control text-light" id="loan_type">
                                            <option value="send" @if ($mainloan->loan_type == 'send' )
                                                selected
                                            @endif>Send</option>
                                            <option value="recive" @if ($mainloan->loan_type == 'recive' )
                                                selected
                                            @endif>Recive</option>
                                        </select>
                                    </div>
                                  </div>

                                <div class="form-group row">
                                    <label for="payment_date" class="col-sm-3 col-form-label">Payment Date</label>
                                    <div class="col-sm-9">
                                      <input type="date" class="form-control text-light" id="payment_date" name="payment_date" value="{{ $mainloan->payment_date }}">
                                    </div>
                                  </div>
                                  <div class="form-group ">
                                    <img  style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid gray" src="{{ asset('upload/loan_image') }}/{{ $mainloan->image }}" id="image" ><br>
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo"  name="image" accept="image/*" onchange="readURL(this)" >
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Update </button>

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
