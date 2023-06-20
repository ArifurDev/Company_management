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

                                <form class="form-sample"action="{{ route('empolyeeinfo.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <p class="card-description"> Empolyee information </p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <select name="email" class="form-control text-light">
                                                        @foreach ($empolyee as $empolyee_email)
                                                            <option value="{{ $empolyee_email->email }}">{{ $empolyee_email->email }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">Salary Raised</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-light" name="salary_raised"   placeholder="Salary Raised">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Salary Receivable</label>
                                                <div class="col-sm-9">
                                                    <input type="text"class="form-control text-light" name="salary_receivable" placeholder="Salary Receivable">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">Loan Taken</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-light" name="loan_taken" placeholder="Loan Taken">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Loan Repaid</label>
                                                <div class="col-sm-9">
                                                    <input type="text"class="form-control text-light" name="loan_repaid" placeholder="Loan Repaid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">Visa Url</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-light" name="visa_url" placeholder="Visa Url">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="text"class="form-control text-light" name="password" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">Bank Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-light" name="bank_name" placeholder="Bank Name">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Bank Account Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text"class="form-control text-light" name="bank_account_number" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">Exchange Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-light" name="exchange_name" placeholder="Exchange Name">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Exchange Account Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text"class="form-control text-light" name="exchange_account_number" placeholder="Exchange Account Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">Bank Card Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-light" name="bank_card_number" placeholder="Bank Card Number">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Pin</label>
                                                <div class="col-sm-9">
                                                    <input type="text"class="form-control text-light" name="Pin" placeholder="Pin">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">Online Transfer Password</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-light" name="online_transfer_Password" placeholder="Online Transfer Password">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">A</label>
                                                <div class="col-sm-9">
                                                    <input type="text"class="form-control text-light" name="a" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">B</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-light" name="b" >
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">C</label>
                                                <div class="col-sm-9">
                                                    <input type="text"class="form-control text-light" name="c" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">D</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control text-light" name="d" >
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">E</label>
                                                <div class="col-sm-9">
                                                    <input type="text"class="form-control text-light" name="e" >
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

    <!-- COPY TO JAVASCRIPT SECTION  -->
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
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
