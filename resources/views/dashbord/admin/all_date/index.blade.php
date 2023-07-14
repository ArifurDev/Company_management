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
                            <h4 class="card-title">Payment Date</h4>
                            <div class="card-description ">


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

                                <div class="table-responsive">
                                    <table class="table table-dark">
                                      <thead>
                                        <tr>
                                          <th class="text-light"> Company </th>
                                          <th class="text-light"> House Rent </th>
                                          <th class="text-light"> Card Bill </th>
                                          <th class="text-light"> Electricity Bill </th>
                                          <th class="text-light"> Sewerage Bill </th>
                                          <th class="text-light"> Water Bill </th>
                                          <th class="text-light"> fewa_bill </th>
                                          <th class="text-light"> wifi_bill </th>
                                          <th class="text-light"> A </th>
                                          <th class="text-light"> B </th>
                                          <th class="text-light"> C </th>
                                          <th class="text-light"> Empolyee </th>

                                          <th class="text-light"> Action </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                            $day =now()->format('d')
                                        ?>
                                        @foreach ($payment_date  as $payment )
                                            <tr>
                                                {{ $day }}
                                                <td class="text-light"> {{ $payment->company_name }} </td>
                                                <td class="text-light"> {{ $payment->house_rent }} </td>
                                                <td class="text-light"> {{ $payment->gard_bill }} </td>
                                                <td class="text-light"> {{ $payment->electricity_bill }} </td>
                                                <td class="text-light"> {{ $payment->sewerage_bill }} </td>

                                                <td class="text-light"> {{ $payment->water_bill }} </td>
                                                <td class="text-light"> {{ $payment->fewa_bill }} </td>
                                                <td class="text-light"> {{ $payment->wifi_bill }} </td>
                                                <td class="text-light"> {{ $payment->a }} </td>
                                                <td class="text-light"> {{ $payment->b }} </td>
                                                <td class="text-light"> {{ $payment->c }} </td>
                                                <td class="text-light"> {{ $payment->empolyee }} </td>
                                                <td >
                                                    <div class="btn-group" role="group" aria-label="Basic example">

                                                          <a href="{{ route('payment.date.edit',['id'=>$payment->id]) }}" class="btn btn-outline-secondary" title="Edit">
                                                              <i class="mdi mdi-file-check btn-icon-append"></i>
                                                            </a>
                                                          <a href="{{ route('payment.date.distroy',['id'=>$payment->id]) }}" class="btn btn-outline-secondary" title="delete temp">
                                                            <i class="mdi mdi-delete"></i>
                                                          </a>
                                                      </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
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



</body>

</html>
