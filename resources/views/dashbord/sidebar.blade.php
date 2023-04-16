<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('dashbord/assets') }}/images/logo.svg" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('dashbord/assets') }}/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="{{ asset('dashbord/assets') }}/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
            <span>{{ Auth::user()->email }}</span>
          </div>
        </div>
        <a  id="profile-dropdown" data-bs-toggle="dropdown"></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @if (Auth::user()->role === 'admin')
    <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('company.create') }}">
          <span class="menu-icon">
            <i class="mdi mdi-grid"></i>
          </span>
          <span class="menu-title">Company</span>
        </a>
      </li>

    @endif


    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-account-multiple"></i>
        </span>
        <span class="menu-title">Empolyee</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            @if (Auth::user()->role === 'admin')
            <li class="nav-item"> <a class="nav-link" href="{{ route('cerate.empolyee') }}">Create Empolyee</a></li>
            @endif

          <li class="nav-item"> <a class="nav-link" href="{{ route('cerate.empolyeereport') }}">Daliy Report</a></li>
          @if (Auth::user()->role === 'admin')
          <li class="nav-item"> <a class="nav-link" href="{{ route('show.empolyeereport') }}">Show Empolyees Report</a></li>
          @endif
        </ul>
      </div>
    </li>
    @if (Auth::user()->role === 'admin')
    <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <span class="menu-icon">
            <i class="mdi mdi-account-star"></i>
          </span>
          <span class="menu-title">Admin</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admindailyraport.create') }}">Create Report</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admindailyraport.show') }}">Reports</a></li>

            <li class="nav-item"> <a class="nav-link" href="{{ route('adminLoanReportSend.create') }}">Loan Send</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('adminLoanReportRecive.create') }}">Loan Recive</a></li>

          </ul>
        </div>
      </li>
    @endif


      @if (Auth::user()->role === 'admin')
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Site</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic1">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('adminwebreport.create') }}"> Save site info </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('adminwebreport.show') }}"> site info </a></li>
          </ul>
        </div>
      </li>
      @endif

      @if (Auth::user()->role === 'admin')
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('payment.date.edit') }}">
          <span class="menu-icon">
            <i class="mdi mdi-dns"></i>
          </span>
          <span class="menu-title">All Payment Date</span>
        </a>
      </li>
      @endif



  </ul>
