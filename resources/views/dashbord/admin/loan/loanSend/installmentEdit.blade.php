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


                        {{-- loan recive installment --}}
                        <div class="col-md-6 grid-margin stretch-card m-auto">
                            <div class="card">
                            @if (Session::has('success'))
                            <div class="alert alert-primary" role="alert">
                                {{ session::get('success') }}
                            </div>
                        @endif
                            <div class="card-body">
                                <a href="{{ route('adminLoanReportSend.create') }}" class="btn btn-outline-secondary mb-2" >
                                    Back
                                  </a>
                                <h4 class="card-title">Loan installment Edit</h4>
                                <form class="forms-sample" action="{{ route("loanSendInstallment.update",['id'=>$send_installment->id]) }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" placeholder="name" name="name" value="{{ $send_installment->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" name="email" value="{{ $send_installment->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Amount</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" placeholder="Amount" name="amount" value="{{ $send_installment->amount }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="amount_due" class="col-sm-3 col-form-label">Amount Due</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="amount_due" placeholder="Amount Due" name="amount_due" value="{{ $send_installment->amount_due }}">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="installment" class="col-sm-3 col-form-label">Installment</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="installment" placeholder="Installment" name="installment" value="{{ $send_installment->installment }}">
                                        </div>
                                        </div>
                                <div class="form-group row">
                                    <label for="payment_date" class="col-sm-3 col-form-label">Payment Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="payment_date"  name="payment_date" value="{{ $send_installment->payment_date }}">
                                    </div>
                                    </div>
                                <button type="submit" class="btn btn-primary me-2">Update</button>
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

    @include('dashbord.allscript')
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>
