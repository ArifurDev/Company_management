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
                                <h4 class="card-title">Empolyees Reports Result</h4>
                           <a href="{{ route('daily.comopany.reports') }}" class="btn btn-primary mb-2">back</a>

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
                                        $t_incoming_card = 0;
                                        $t_incoming_cash = 0;
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
                                            <td> {{ $empolyee->created_at->format('d/m/Y') }}</td>
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
                                                $t_incoming_card = $t_incoming_card + $empolyee->incoming_card;
                                                $t_incoming_cash = $t_incoming_cash + $empolyee->incoming_cash;

                                                $total_incoming = $total_incoming + $empolyee->incoming;
                                                $total_outgoing = $total_outgoing + $empolyee->outgoing;
                                                $total_cash = $total_cash + $empolyee->cash;
                                            @endphp
                                          </tr>
                                        @endforeach
                                          <tr>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $t_incoming_card }} tk</td>
                                            <td>{{ $t_incoming_cash }} tk</td>
                                            <td>{{ $total_incoming }} tk</td>
                                            <td>{{ $total_outgoing }} tk</td>
                                            <td>{{ $total_cash }} tk</td>
                                            <td></td>
                                            <td></td>
                                          </tr>
                                    </tbody>

                                  </table>

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



</body>

</html>
