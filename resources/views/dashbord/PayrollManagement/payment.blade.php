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
                    <div class="col-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Empolyee Salary</h4>

                              <p class="card-description">Payment Month <code>{{ $prev }}</code> </p>
                                <div class="row">
                                    <div class="col-md-6 grid-margin stretch-card">
                                        <div class="card">
                                          <div class="card-body">
                                            <h4 class="card-title">Personal Info</h4>
                                            <ul>
                                              <li>Company: {{ $empolyee_information->compony_name }}</li>
                                              <li>Name: {{ $empolyee_information->name }}</li>
                                              <li>Email: {{ $empolyee_information->email }}</li>
                                              <li>Phone: {{ $empolyee_information->number }}</li>
                                              <li>Bank Name: {{ $empolyee_information->bank_name }}</li>
                                              <li>Bank Account Number: {{ $empolyee_information->bank_account_number }}</li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>


                                      <div class="col-md-6 grid-margin stretch-card">
                                        <div class="card">
                                          <div class="card-body">
                                            <h4 class="card-title">Payment Info</h4>
                                            <ul>
                                              <li>Salary: {{ $empolyee_information->empolyee_salary }}</li>
                                             @if ($advanch_check)
                                             <li>Advance Pay Month: {{ $advanch_check->month }}</li>
                                             <li>Advance Pay: {{ $advanch_check->Amount }}</li>
                                             <li>Due: {{$empolyee_information->empolyee_salary - $advanch_check->Amount }}</li>
                                             @endif
                                              <li>Phone: {{ $empolyee_information->number }}</li>
                                              <li>Bank Name: {{ $empolyee_information->bank_name }}</li>
                                              <li>Bank Account Number: {{ $empolyee_information->bank_account_number }}</li>
                                              <li>Payment @if ($paid_check)
                                                   <label class="badge badge-success">Paid</label>
                                              @else
                                                   <label class="badge badge-danger">Unpaid</label>
                                              @endif</li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                </div>

                                <div class="row">
                                    @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                             <ul>
                                                <li >
                                                     <p class="text-danger">{{ $error }}
                                                    </p>
                                                </li>
                                            </ul>
                                        @endforeach
                                     @endif
                                    <form class="form-sample" action="{{ route('salary.save') }}" method="POST">
                                        @csrf
                                        <input type="hidden" class="form-control" value="{{ $empolyee_information->email }}" name="empolyee_email">
                                        <input type="hidden" class="form-control" value="{{ $empolyee_information->compony_name }}" name="empolyee_companoy">
                                        <input type="hidden" class="form-control" value="{{ $empolyee_information->bank_name }}" name="empolyee_bank_name">
                                        <input type="hidden" class="form-control" value="{{ $empolyee_information->bank_account_number }}" name="empolyee_bank_account_number">
                                        <input type="hidden" class="form-control" value="{{ $empolyee_information->empolyee_salary }}" name="empolyee_salary">

                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group row">
                                              <label class="col-sm-3 col-form-label">Month</label>
                                              <div class="col-sm-9">
                                                @if ($advanch_check)
                                                <input type="date" class="form-control text-light" name="payment_date" value="{{ $advanch_check->edit_date }}">
                                                @else
                                                <input type="date" class="form-control text-light" name="payment_date" >
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group row">
                                              <label class="col-sm-3 col-form-label">Payment System</label>
                                              <div class="col-sm-9">
                                                <select class="form-control text-light" name="payment_system">
                                                    <option value="bank">Bank</option>
                                                    <option value="cash" selected>Hand Cash</option>
                                                  </select>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group row">
                                              <label class="col-sm-3 col-form-label">Payment Status</label>
                                              <div class="col-sm-9">
                                                <select class="form-control text-light" name="payment_status">
                                                    <option value="advance">Advance</option>
                                                    <option value="none" selected>None</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group row">
                                              <label class="col-sm-3 col-form-label">Amount</label>
                                              <div class="col-sm-9">
                                                @if ($advanch_check)
                                                 <input type="number" class="form-control text-light" min="0" name="amount" value="{{$empolyee_information->empolyee_salary - $advanch_check->Amount }}">
                                                @else
                                                 <input type="number" class="form-control text-light" min="0" name="amount">
                                                @endif

                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary ">Pay</button>
                                        </div>
                                      </form>
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

    <!-- ajax code -->



</body>

</html>
