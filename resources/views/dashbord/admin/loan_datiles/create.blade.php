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
                              <h4 class="card-title">Loan Installment</h4>
                              @if ($errors->any())
                              @foreach ($errors->all() as $error)
                                      <ul>
                                          <li>
                                              <p class="text-light">{{ $error }}</p>
                                          </li>
                                      </ul>
                              @endforeach
                             @endif


                             <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title"><img width="10%" src="{{ asset('upload/loan_image') }}/{{ $main_loan_info->image }}" alt=""></h4>
                                  <p class="card-description"> Name <code>&lt;{{ $main_loan_info->name }}&gt;</code>  </p>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <address>
                                        <p> Phone: {{ $main_loan_info->phone }}</p>
                                        <p> Email: {{ $main_loan_info->email }} </p>
                                        <p>Loan Type: <label  @if ($main_loan_info->loan_type === 'send')
                                            class="badge badge-primary mt-2"
                                        @else
                                          class="badge badge-danger mt-2"
                                        @endif> {{ $main_loan_info->loan_type }}</label></p>
                                        <p>Status: <label class="badge badge-danger mt-2"> {{ $main_loan_info->status }}</label></p>
                                      </address>
                                      <div class=""  >

                                        <form action="{{ route('status.change',$main_loan_info->id) }}" method="post">
                                            @csrf
                                            <p class="card-description">if your complete loan payment just click this</p>
                                            <input type="hidden" value="complete" name="status">
                                              <button type="submit" class="btn btn-primary"> <i class="mdi mdi-comment-check"></i></button>
                                          </form>


                                      </div>

                                    </div>
                                    <div class="col-md-6">
                                      <address >
                                        <p> Amount: {{ $main_loan_info->amount }}</p>
                                        <p> Installment: {{ $main_loan_info->installment }} </p>
                                        <p> Per Installment: {{ $main_loan_info->per_installment }} </p>
                                        <p> Payment Date: {{ $main_loan_info->payment_date }} </p>

                                        <p> Pay installment : {{ $installment_count }} </p>
                                        <p> Pay Amount : {{ $pay_installment }} </p>
                                        <p> Due Amount : {{ $main_loan_info->amount - $pay_installment }} </p>
                                      </address>
                                    </div>
                                  </div>
                                </div>
                              </div>

                           

                              <form class="forms-sample" action="{{ route('loandetaile.store') }}" method="POST">
                                @csrf
                                    {{-- main loan id --}}
                                    <input type="hidden"  name="mainloan_id" value="{{ $main_loan_id }}">

                                <div class="form-group row">
                                  <label for="installment" class="col-sm-3 col-form-label">Installment</label>
                                  <div class="col-sm-9">
                                    <input type="number" class="form-control text-light" id="installment" placeholder="Enter installment number" name="installment" min="1">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control text-light" id="amount" placeholder="Enter amount" name="amount">
                                  </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>
