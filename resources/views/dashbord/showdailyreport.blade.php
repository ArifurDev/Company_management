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
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                @if (Session::has('success'))
                                <div class="alert alert-primary" role="alert">
                                    {{ session::get('success') }}
                                </div>
                            @endif
                              <div class="card-body">
                                <h4 class="card-title">Empolyees Reports</h4>
                                  {{-- date search form --}}
                                  {{-- <form action="{{ route('daily.comopany.reports.search') }}" method="GET">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm col-form-label">From</label>
                                                <div class="col-sm ">
                                                    <input type="date" class="form-control" id="" name="fromdate">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm col-form-label">To</label>
                                                <div class="col-sm">
                                                    <input type="date" class="form-control" id=""name="today">
                                                </div>
                                            </div>
                                        <div class="col-md">
                                            <select class="form-control text-light" id="exampleSelectGender" name="payment">
                                                <option value=" " selected>payment method</option>
                                                <option value="card">card</option>
                                                <option value="none">None</option>
                                              </select>

                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <select class="form-control text-light" id="exampleSelectGender" name="company">
                                                    <option value=" " selected>company</option>
                                                    @foreach ($componies as $compony)
                                                     <option value="{{ $compony->compony_name }}" >{{ $compony->compony_name }}</option>
                                                    @endforeach
                                                  </select>
                                            </div>

                                        </div>
                                        <div class="col-mdm-0">
                                            <button class="btn btn-primary" type="submit">Filter</button>
                                        </div>


                                    </div>
                                  </form> --}}
                                  <form class="form-sample" action="{{ route('daily.comopany.reports.search') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Form Date</label>
                                          <div class="col-sm-9">
                                            <input type="date" class="form-control search" name="form_date">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">To Date</label>
                                          <div class="col-sm-9">
                                            <input type="date" class="form-control search" name="to_date">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">

                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Company</label>
                                          <div class="col-sm-9">
                                            <select class="form-control text-light" name="company">
                                              @foreach ($componies as $compony)
                                               <option value="{{ $compony->compony_name }}">{{ $compony->compony_name }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <button type="reset" class="btn btn-danger mb-3">Reset</button>
                                    <button type="submit" class="btn btn-primary mb-3">Filter</button>
                                </form>
                                  <!-- Large Modal -->

                                <div class="table-responsive">
                                  <table class="table table-dark">
                                    <thead>
                                      <tr>

                                        <th> Company </th>
                                        <th> Empolyee Email </th>
                                        <th> Incoming Card</th>
                                        <th> Incoming Cash</th>
                                        <th> Incoming </th>
                                        <th> Outgoing </th>
                                        <th> Cash </th>
                                        <th> Date </th>
                                        <th> Acction </th>
                                      </tr>
                                    </thead>
                                    @php
                                        $total_incoming_card = 0;
                                        $total_incoming_cash = 0;
                                        $total_incoming = 0;
                                        $total_outgoing = 0;
                                        $total_cash = 0;
                                    @endphp
                                    <tbody class="alldata">

                                        @foreach ($empolyees_reports as $empolyee)
                                        <tr>
                                            <td> {{ $empolyee->company }} </td>
                                            <td> {{ $empolyee->empolyee }} </td>
                                            <td> {{ $empolyee->incoming_card }} tk</td>
                                            <td> {{ $empolyee->incoming_cash }} tk</td>
                                            <td> {{ $empolyee->incoming }} tk</td>
                                            <td> {{ $empolyee->outgoing }} tk</td>
                                            <td> {{ $empolyee->cash }} tk</td>
                                            <td>{{ $empolyee->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="{{ route('details.empolyeereport',['id'=>$empolyee->id]) }}" title="details">
                                                        <i class="mdi mdi-account-card-details"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-primary" href="{{ route('edit.empolyeereport',['id'=>$empolyee->id]) }}" title="edit">
                                                        <i class="mdi mdi-border-color"></i>
                                                    </a>

                                                    <form action="{{ route('destroy.empolyeereport',['id'=>$empolyee->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary" title="delete tmp">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                    </form>
                                            </div></td>
                                            @php
                                                $total_incoming_card = $total_incoming_card + $empolyee->incoming_card;
                                                $total_incoming_cash = $total_incoming_cash + $empolyee->incoming_cash;
                                                $total_incoming = $total_incoming + $empolyee->incoming;
                                                $total_outgoing = $total_outgoing + $empolyee->outgoing;
                                                $total_cash = $total_cash + $empolyee->cash;
                                            @endphp
                                          </tr>
                                        @endforeach
                                          <tr>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $total_incoming_card }} card</td>
                                            <td>{{ $total_incoming_cash }} cash</td>
                                            <td>{{ $total_incoming }} tk</td>
                                            <td>{{ $total_outgoing }} tk</td>
                                            <td></td>
                                            <td>{{ $total_cash }} tk</td>
                                            <td></td>
                                            
                                          </tr>
                                    </tbody>
                                    <tbody id="Content" class="searchdata"></tbody>   {{--  search result show this table--}}
                                  </table>
                                  <div class="d-flex justify-content-center mt-3">

                                    {{ $empolyees_reports->links('pagination::bootstrap-5') }}
                                </div>
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

        $('.search').on('keyup',function()
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

        //  $.ajax({
        //          type:'get',
        //          url:'{{URL::to('empolyeereportsearch')}}',
        //          data:{'search':$value},
        //          success:function(data)
        //          {
        //              console.log(data);
        //              $('#Content').html(data);
        //          }
        //      });

         });
     </script>

</body>

</html>
