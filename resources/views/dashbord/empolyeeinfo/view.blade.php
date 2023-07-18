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
                                    <div class="col-md-8 grid-margin stretch-card">
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="d-flex flex-row justify-content-between">
                                            <h4 class="card-title mb-1">Empolyee Information</h4>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('empolyeeinfo.index') }}" class="btn btn-outline-info btn-fw" title="view"><i class="mdi mdi-chevron-left"></i>Back</a>
                                                <a href="{{ route('empolyeeinfo.show',$empolyeeinfo->id) }}" class="btn btn-outline-success" title="view"><i class="mdi mdi-eye"></i></a>
                                                <a href="{{ route('empolyeeinfo.edit',$empolyeeinfo->id) }}" class="btn btn-outline-success "><i class="mdi mdi-pencil"></i></a>
                                                <form action="{{ route('empolyeeinfo.destroy',$empolyeeinfo->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger"><i class="mdi mdi-delete"></i></button>
                                                </form>
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
                                                      <p class="text-muted mb-0">{{ $empolyeeinfo->email }}</p>
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                      <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                      </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                      <div class="flex-grow">
                                                        <h6 class="preview-subject">Empolyee Salary</h6>
                                                        <p class="text-muted mb-0">{{ $empolyeeinfo->empolyee_salary }}</p>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                      <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                      </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                      <div class="flex-grow">
                                                        <h6 class="preview-subject">Salary Raised</h6>
                                                        <p class="text-muted mb-0">{{ $empolyeeinfo->salary_raised }}</p>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                      <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                      </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                      <div class="flex-grow">
                                                        <h6 class="preview-subject">Salary Receivable</h6>
                                                        <p class="text-muted mb-0">{{ $empolyeeinfo->salary_receivable }}</p>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                      <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                      </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                      <div class="flex-grow">
                                                        <h6 class="preview-subject">Loan Taken</h6>
                                                        <p class="text-muted mb-0">{{ $empolyeeinfo->loan_taken }}</p>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                      <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                      </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                      <div class="flex-grow">
                                                        <h6 class="preview-subject">Loan Repaid</h6>
                                                        <p class="text-muted mb-0">{{ $empolyeeinfo->loan_repaid }}</p>
                                                      </div>
                                                    </div>
                                                  </div>


                                                  <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                      <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                      </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                      <div class="flex-grow">
                                                        <h6 class="preview-subject">Visa Url</h6>
                                                        <p class="text-muted mb-0">{{ $empolyeeinfo->visa_url }}</p>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="preview-item border-bottom">
                                                      <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-primary">
                                                          <i class="mdi mdi-file-document"></i>
                                                        </div>
                                                      </div>
                                                      <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                          <h6 class="preview-subject">Password</h6>
                                                          <p class="text-muted mb-0">{{ $empolyeeinfo->password }}</p>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="preview-item border-bottom">
                                                      <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-primary">
                                                          <i class="mdi mdi-file-document"></i>
                                                        </div>
                                                      </div>
                                                      <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                          <h6 class="preview-subject">Bank Name</h6>
                                                          <p class="text-muted mb-0">{{ $empolyeeinfo->bank_name }}</p>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="preview-item border-bottom">
                                                      <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-primary">
                                                          <i class="mdi mdi-file-document"></i>
                                                        </div>
                                                      </div>
                                                      <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                          <h6 class="preview-subject">Bank Account Number</h6>
                                                          <p class="text-muted mb-0">{{ $empolyeeinfo->bank_account_number }}</p>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="preview-item border-bottom">
                                                        <div class="preview-thumbnail">
                                                          <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                          </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                          <div class="flex-grow">
                                                            <h6 class="preview-subject">Exchange Account Number</h6>
                                                            <p class="text-muted mb-0">{{ $empolyeeinfo->exchange_account_number }}</p>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="preview-item border-bottom">
                                                        <div class="preview-thumbnail">
                                                          <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                          </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                          <div class="flex-grow">
                                                            <h6 class="preview-subject">Exchange Account Number</h6>
                                                            <p class="text-muted mb-0">{{ $empolyeeinfo->exchange_account_number }}</p>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="preview-item border-bottom">
                                                        <div class="preview-thumbnail">
                                                          <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                          </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                          <div class="flex-grow">
                                                            <h6 class="preview-subject">Bank Card Number</h6>
                                                            <p class="text-muted mb-0">{{ $empolyeeinfo->bank_card_number }}</p>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="preview-item border-bottom">
                                                        <div class="preview-thumbnail">
                                                          <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                          </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                          <div class="flex-grow">
                                                            <h6 class="preview-subject">Pin</h6>
                                                            <p class="text-muted mb-0">{{ $empolyeeinfo->Pin }}</p>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="preview-item border-bottom">
                                                        <div class="preview-thumbnail">
                                                          <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                          </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                          <div class="flex-grow">
                                                            <h6 class="preview-subject">Online Transfer Password</h6>
                                                            <p class="text-muted mb-0">{{ $empolyeeinfo->online_transfer_Password }}</p>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="preview-item border-bottom">
                                                        <div class="preview-thumbnail">
                                                          <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                          </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                          <div class="flex-grow">
                                                            <h6 class="preview-subject">A</h6>
                                                            <p class="text-muted mb-0">{{ $empolyeeinfo->a }}</p>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="preview-item border-bottom">
                                                        <div class="preview-thumbnail">
                                                          <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                          </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                          <div class="flex-grow">
                                                            <h6 class="preview-subject">B</h6>
                                                            <p class="text-muted mb-0">{{ $empolyeeinfo->b }}</p>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="preview-item border-bottom">
                                                        <div class="preview-thumbnail">
                                                          <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                          </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                          <div class="flex-grow">
                                                            <h6 class="preview-subject">C</h6>
                                                            <p class="text-muted mb-0">{{ $empolyeeinfo->c }}</p>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="preview-item border-bottom">
                                                        <div class="preview-thumbnail">
                                                          <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                          </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                          <div class="flex-grow">
                                                            <h6 class="preview-subject">D</h6>
                                                            <p class="text-muted mb-0">{{ $empolyeeinfo->d }}</p>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="preview-item border-bottom">
                                                        <div class="preview-thumbnail">
                                                          <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                          </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                          <div class="flex-grow">
                                                            <h6 class="preview-subject">E</h6>
                                                            <p class="text-muted mb-0">{{ $empolyeeinfo->e }}</p>
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
