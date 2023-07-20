<!DOCTYPE html>
<html lang="en">

<head>
    {{-- all link --}}
    @include('dashbord.headerlink')


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>
<style>
    option{
        color: black;
    }
</style>
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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Empolyee Salary</h4>
                            <div class="d-flex justify-content-between">
                                <p class="card-description"> important <code>.document</code></p>

                            </div>
                            <table id="example" class="display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-light"> # </th>
                                        <th class="text-light"> Date </th>
                                        <th class="text-light">  Action </th>
                                      </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payment_information as $info)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $info->payment_date }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <form action="{{ route('selected.month.view') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $info->payment_date }}" name="date">
                                                    <button type="submit"   class="btn btn-primary btn-icon-text">
                                                        View  <i class="mdi mdi-eye"></i>
                                                   </button>
                                                </form>
                                                <form action="{{ route('salary.pdf.download') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $info->payment_date }}" name="date">
                                                    <button type="submit"   class="btn btn-danger btn-icon-text">
                                                        Print <i class="mdi mdi-printer btn-icon-append"></i>
                                                   </button>
                                                </form>
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
