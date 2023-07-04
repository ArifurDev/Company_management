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
                            <h4 class="card-title">site info Edit</h4>
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

                            <form class="forms-sample" action="{{ route("adminwebreport.update",['id'=>$sitereports->id]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Company</label>
                                    <select class="form-control text-light" name="company">
                                        <option value="{{ $sitereports->company }}" selected>{{ $sitereports->company }}</option>
                                        @foreach ($componies as $compony)
                                         <option value="{{ $compony->compony_name }}">{{ $compony->compony_name }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control text-light" id="email" placeholder="email" name="email" value="{{ $sitereports->email }}">
                                  </div>
                              <div class="form-group">
                                <label for="site_name">Site Name</label>
                                <input type="text" class="form-control text-light" id="site_name" placeholder="site_name" name="site_name" value="{{ $sitereports->site_name }}">
                              </div>
                              <div class="form-group">
                                <label for="url">URL</label>
                                <input type="url" class="form-control text-light" id="url" placeholder="url" name="url" value="{{ $sitereports->url }}">
                              </div>
                              <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" class="form-control text-light" id="user_name" placeholder="user_name" name="user_name" value="{{ $sitereports->user_name }}">
                              </div>
                              <div class="form-group">
                                <label for="user_id">User Id</label>
                                <input type="text" class="form-control text-light" id="user_id" placeholder="user id" name="user_id" value="{{ $sitereports->user_id }}">
                              </div>
                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control text-light" id="password" placeholder="password" name="password" value="{{ $sitereports->password }}">
                              </div>
                              <div class="form-group">
                                <label for="Create">Why Create this</label>
                                <input type="text" class="form-control text-light" id="Create" placeholder="Why Create this" name="why_create" value="{{ $sitereports->why_create }}">
                              </div>
                              <div class="form-group">
                                <label for="Number">Number</label>
                                <input type="text" class="form-control text-light" id="Number" placeholder="Number" name="number" value="{{ $sitereports->number }}">
                              </div>
                              <div class="form-group">
                                <label for="verifi_code">Verification Code</label>
                                <input type="text" class="form-control text-light" id="verifi_code" placeholder="verifi code" name="verifi_code" value="{{ $sitereports->verifi_code }}">
                              </div>
                              <div class="form-group">
                                <label for="payment_date">Payment Date</label>
                                <input type="date" class="form-control text-light" id="payment_date" placeholder="payment date" name="payment_date" value="{{ $sitereports->payment_date }}">
                              </div>
                              <div class="form-group">
                                <label for="card_holder_name">Card Holder Name</label>
                                <input type="text" class="form-control text-light" id="card_holder_name"  placeholder="Card Holder Name" name="card_holder_name" value="{{ $sitereports->card_holder_name }}">
                              </div>
                              <div class="form-group">
                                <label for="card_number">Card Number</label>
                                <input type="text" class="form-control text-light" id="card_number" placeholder="Card Number" name="card_number" value="{{ $sitereports->card_number }}">
                              </div>
                              <div class="form-group">
                                <label for="currency">Currency</label>
                                <input type="text" class="form-control text-light" id="currency"  placeholder="Currency" name="currency" value="{{ $sitereports->currency }}">
                              </div>
                              <div class="form-group">
                                <label for="expairy_date">Expairy Date</label>
                                <input type="date" class="form-control text-light" id="expairy_date" placeholder="Expairy Date" name="expairy_date" value="{{ $sitereports->expairy_date }}">
                              </div>
                              <div class="form-group">
                                <label for="verifi_code">Bank Name</label>
                                <input type="text" class="form-control text-light" id="bank_name"  placeholder="Bank Name" name="bank_name" value="{{ $sitereports->bank_name }}">
                              </div>
                              <div class="form-group">
                                <label for="bank_account_number">Bank Account Number</label>
                                <input type="text" class="form-control text-light" id="bank_account_number" placeholder="Bank Account Number" name="bank_account_number" value="{{ $sitereports->bank_account_number }}">
                              </div>
                              <div class="form-group">
                                <label for="bank_card_number">Bank Card Number</label>
                                <input type="text" class="form-control text-light" id="bank_card_number" placeholder="Bank Card Number" name="bank_card_number" value="{{ $sitereports->bank_card_number }}">
                              </div>
                              <div class="form-group">
                                <label for="exchange_name">Exchange Name</label>
                                <input type="text" class="form-control text-light" id="exchange_name"  placeholder="exchange_name" name="exchange_name" value="{{ $sitereports->exchange_name }}">
                              </div>
                              <div class="form-group">
                                <label for="payment_date">Exchange Account Number</label>
                                <input type="text" class="form-control text-light" id="exchange_account_number" placeholder="Exchange Account Number" name="exchange_account_number" value="{{ $sitereports->exchange_account_number }}">
                              </div>

                              <div class="form-group">
                                <label for="bank_account_number">Bank Account Number</label>
                                <input type="text" class="form-control text-light" id="bank_account_number" placeholder="Bank Account Number" name="bank_account_number" value="{{ $sitereports->bank_account_number }}">
                              </div>
                              <div class="form-group">
                                <label for="Pin">Pin</label>
                                <input type="text" class="form-control text-light" id="Pin"  placeholder="Pin" name="Pin" value="{{ $sitereports->Pin }}">
                              </div>
                              <div class="form-group">
                                <label for="online_transfer_Password">Online Transfer Password</label>
                                <input type="text" class="form-control text-light" id="online_transfer_Password" placeholder="Online Transfer Password" name="online_transfer_Password" value="{{ $sitereports->online_transfer_Password }}">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlTextarea1">Note</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note" >{{ $sitereports->note }}</textarea>
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
