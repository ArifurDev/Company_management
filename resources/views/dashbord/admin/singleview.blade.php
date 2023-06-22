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
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                              <h4 class="card-title mb-1">Open Projects</h4>
                              <a  href="{{ route('adminwebreport.edit',['id'=>$single_view->id]) }}" class="btn btn-primary"> <i class="mdi mdi-border-color"></i></a>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">company</h6>
                                          <p class="text-muted mb-0">{{ $single_view->company }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Email</h6>
                                          <p class="text-muted mb-0">{{ $single_view->email }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Site Name</h6>
                                          <p class="text-muted mb-0">{{ $single_view->site_name }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Url</h6>
                                          <p class="text-muted mb-0">{{ $single_view->url }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">User Name</h6>
                                          <p class="text-muted mb-0">{{ $single_view->user_name }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">User Id</h6>
                                          <p class="text-muted mb-0">{{ $single_view->user_id }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Password</h6>
                                          <p class="text-muted mb-0">{{ $single_view->password }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Why Create</h6>
                                          <p class="text-muted mb-0">{{ $single_view->why_create }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Number</h6>
                                          <p class="text-muted mb-0">{{ $single_view->number }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Verifi Code</h6>
                                          <p class="text-muted mb-0">{{ $single_view->verifi_code }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Payment Date</h6>
                                          <p class="text-muted mb-0">{{ $single_view->payment_date }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Note</h6>
                                          <p class="text-muted mb-0">{{ $single_view->note }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Bank Name</h6>
                                          <p class="text-muted mb-0">{{ $single_view->bank_name }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Bank Account Number</h6>
                                          <p class="text-muted mb-0">{{ $single_view->bank_account_number }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Exchange Name</h6>
                                          <p class="text-muted mb-0">{{ $single_view->exchange_name }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Exchange Account Nmber</h6>
                                          <p class="text-muted mb-0">{{ $single_view->exchange_account_number }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Bank Card Number</h6>
                                          <p class="text-muted mb-0">{{ $single_view->bank_card_number }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Pin</h6>
                                          <p class="text-muted mb-0">{{ $single_view->Pin }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Online Transfer Password</h6>
                                          <p class="text-muted mb-0">{{ $single_view->online_transfer_Password }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Card Holder Name</h6>
                                          <p class="text-muted mb-0">{{ $single_view->card_holder_name }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Card Number</h6>
                                          <p class="text-muted mb-0">{{ $single_view->card_number }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Currency</h6>
                                          <p class="text-muted mb-0">{{ $single_view->currency }}</p>
                                        </div>

                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                          <i class="mdi mdi-file-document"></i>
                                        </div>
                                      </div>
                                      <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                          <h6 class="preview-subject">Expairy Date</h6>
                                          <p class="text-muted mb-0">{{ $single_view->expairy_date }}</p>
                                        </div>

                                      </div>

                                    </div>

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
    @include('dashbord.allscript')
    {{-- sweetalert --}}



</body>

</html>
