<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">

</div>

<ul class="nav">

    <li class="nav-item profile">
        <div class="profile-desc">
            <div class="profile-pic">
                <div class="count-indicator">
                    <img class="img-xs rounded-circle " src="{{ asset('dashbord/assets') }}/images/faces/face15.jpg"
                        alt="">
                    <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                    <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                    <span>{{ Auth::user()->email }}</span>
                </div>
            </div>
            <a id="profile-dropdown" data-bs-toggle="dropdown"></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                aria-labelledby="profile-dropdown">
            </div>
        </div>
    </li>
    <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
    </li>
    @if (Auth::user()->role != 'assistant')
    <li class="nav-item menu-items {{ Request::routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title text-light">Dashboard</span>
        </a>
    </li>
    @endif

    @if (Auth::user()->role === 'admin')
    <li class="nav-item menu-items {{ Request::routeIs('adminwebreport*') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title text-light">Site</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic1">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item {{ Request::routeIs('adminwebreport.create') ? 'active' : '' }}"> <a
                        class="nav-link text-light" href="{{ route('adminwebreport.create') }}"> Save site info </a>
                </li>
                <li class="nav-item {{ Request::routeIs('adminwebreport.show') ? 'active' : '' }}"> <a
                        class="nav-link text-light" href="{{ route('adminwebreport.show') }}"> site info </a></li>
            </ul>
        </div>
    </li>
    @endif

    @if (Auth::user()->role === 'admin')
    <li class="nav-item menu-items {{ Request::routeIs('company.create') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('company.create') }}">
            <span class="menu-icon">
                <i class="mdi mdi-grid"></i>
            </span>
            <span class="menu-title text-light">Company</span>
        </a>
    </li>
    @endif

    @if (Auth::user()->role === 'admin')
    <li class="nav-item menu-items {{ Request::routeIs('cerate.empolyee','empolyeeinfo*') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
                <i class="mdi mdi-account-multiple"></i>
            </span>
            <span class="menu-title text-light">Empolyee</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item {{ Request::routeIs('cerate.empolyee') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('cerate.empolyee') }}">Create
                        Empolyee</a></li>
                <li class="nav-item {{ Request::routeIs('empolyeeinfo.create') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('empolyeeinfo.create') }}">Create
                        Information</a></li>
                <li class="nav-item {{ Request::routeIs('empolyeeinfo.index') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('empolyeeinfo.index') }}">Show
                        Information</a></li>
            </ul>
        </div>
    </li>
    @endif


    @if (Auth::user()->role != 'assistant')
    <li class="nav-item menu-items {{ Request::routeIs('cerate.empolyeereport','show.empolyeereport') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#daily-report" aria-expanded="false"
            aria-controls="ui-basic">
            <span class="menu-icon">
                <i class="mdi mdi-file-document"></i>
            </span>
            <span class="menu-title text-light">Empolyee Reports</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="daily-report">
            <ul class="nav flex-column sub-menu">
                @if (Auth::user()->role === 'empolyees')
                <li class="nav-item {{ Request::routeIs('cerate.empolyeereport') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('cerate.empolyeereport') }}">Daliy
                        Report</a></li>
                @endif
                @if (Auth::user()->role === 'admin')
                <li class="nav-item {{ Request::routeIs('cerate.empolyeereport') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('cerate.empolyeereport') }}">Daliy
                        Report</a></li>
                @endif
                @if (Auth::user()->role === 'admin')
                <li class="nav-item {{ Request::routeIs('show.empolyeereport') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('show.empolyeereport') }}">Show
                        Empolyees Report</a></li>
                @endif
            </ul>
        </div>
    </li>
    @endif


    @if (Auth::user()->role === 'admin')
    <li class="nav-item menu-items {{ Request::routeIs('admindailyraport.create','admindailyraport.show','admininfo.create','admininfo.index') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <span class="menu-icon">
                <i class="mdi mdi-account-star"></i>
            </span>
            <span class="menu-title text-light">Admin</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item {{ Request::routeIs('admindailyraport.create') ? 'active' : '' }}"> <a class="nav-link text-light"
                        href="{{ route('admindailyraport.create') }}">Create Report</a></li>
                <li class="nav-item {{ Request::routeIs('admindailyraport.show') ? 'active' : '' }}"> <a class="nav-link text-light"
                        href="{{ route('admindailyraport.show') }}">Reports</a></li>
                {{--
                <hr>
                <li class="nav-item"> <a class="nav-link text-light" href="{{ route('personalinfo.create') }}">Site
                        Info</a></li>
                <li class="nav-item"> <a class="nav-link text-light" href="{{ route('personalinfo.index') }}">Show Site
                        Info</a></li> --}}
                <hr>
                <li class="nav-item {{ Request::routeIs('admininfo.create') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('admininfo.create') }}">Add
                        Information</a></li>
                <li class="nav-item {{ Request::routeIs('admininfo.index') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('admininfo.index') }}">Show
                        Information</a></li>

            </ul>
        </div>
    </li>
    @endif



    @if (Auth::user()->role === 'admin')
    <li class="nav-item menu-items {{ Request::routeIs('mainloan.index','mainloan.create','mainloan.complete') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#loan" aria-expanded="false" aria-controls="loan">
            <span class="menu-icon">
                <i class="mdi mdi mdi-bank"></i>
            </span>
            <span class="menu-title text-light">Loan Managment</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="loan">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item {{ Request::routeIs('mainloan.create') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('mainloan.create') }}">Add
                        Loan</a></li>
                <li class="nav-item {{ Request::routeIs('mainloan.index') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('mainloan.index') }}">Show
                        Loan List</a></li>
                <li class="nav-item {{ Request::routeIs('mainloan.complete') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('mainloan.complete') }}">Complete
                        Loan List</a></li>
            </ul>
        </div>
    </li>




    {{-- Payroll management system start --}}
    <li class="nav-item menu-items {{ Request::routeIs('salary.managment','salary.managment.index') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#Payroll" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
                <i class="mdi mdi-cash-usd"></i>
            </span>
            <span class="menu-title text-light">Payroll Managment</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="Payroll">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item {{ Request::routeIs('salary.managment') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('salary.managment') }}">Empolyee
                        Salary</a></li>
                <li class="nav-item {{ Request::routeIs('salary.managment.index') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('salary.managment.index') }}">Show
                        Salary</a></li>
            </ul>
        </div>
    </li>
    {{-- Payroll management system end --}}
    @endif


    @if (Auth::user()->role === 'admin')
    <li class="nav-item menu-items {{ Request::routeIs('billdate.create','billdate.show') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#payment" aria-expanded="false" aria-controls="payment">
            <span class="menu-icon">
                <i class="mdi mdi-dns"></i>
            </span>
            <span class="menu-title text-light">Payment Date</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="payment">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item {{ Request::routeIs('billdate.create') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('billdate.create') }}">Company
                        Billdate Create </a></li>
                <li class="nav-item {{ Request::routeIs('billdate.show') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('billdate.show') }}">Billdate
                        Show</a></li>
            </ul>
        </div>
    </li>
    @endif

    {{-- Assistant access this section --}}
    @if (Auth::user()->role == 'assistant')
    <li class="nav-item menu-items {{ Request::routeIs('adminwebreport.create') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title text-light">Site</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic1">
            <ul class="nav flex-column sub-menu">

                <li class="nav-item {{ Request::routeIs('adminwebreport.create') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('adminwebreport.create') }}"> Save
                        site info </a></li>
            </ul>
        </div>
    </li>



    <li class="nav-item menu-items {{ Request::routeIs('company.create') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('company.create') }}">
            <span class="menu-icon">
                <i class="mdi mdi-grid"></i>
            </span>
            <span class="menu-title text-light">Company</span>
        </a>
    </li>




    <li class="nav-item menu-items {{ Request::routeIs('empolyeeinfo.create') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
                <i class="mdi mdi-account-multiple"></i>
            </span>
            <span class="menu-title text-light">Empolyee</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link text-light" href="{{ route('empolyeeinfo.create') }}">Create
                        Information</a></li>
            </ul>
        </div>
    </li>



    <li class="nav-item menu-items {{ Request::routeIs('admindailyraport.create') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <span class="menu-icon">
                <i class="mdi mdi-account-star"></i>
            </span>
            <span class="menu-title text-light">Admin</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item {{ Request::routeIs('admindailyraport.create') ? 'active' : '' }}"> <a class="nav-link text-light"
                        href="{{ route('admindailyraport.create') }}">Create Report</a></li>
                {{-- <li class="nav-item"> <a class="nav-link text-light" href="{{ route('personalinfo.create') }}">Site
                        Info</a></li> --}}
                <li class="nav-item"> <a class="nav-link text-light " href="{{ route('admininfo.create') }}">Add
                        Information</a></li>
            </ul>
        </div>
    </li>





    {{-- <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#loan" aria-expanded="false" aria-controls="loan">
            <span class="menu-icon">
                <i class="mdi mdi mdi-bank"></i>
            </span>
            <span class="menu-title">Loan Managment</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="loan">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('mainloan.create') }}">Add Loan</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('mainloan.index') }}">Show Loan List</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('mainloan.complete') }}">Complete Loan List</a>
                </li>
            </ul>
        </div>
    </li> --}}




    <li class="nav-item menu-items {{ Request::routeIs('billdate.create') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#payment" aria-expanded="false" aria-controls="payment">
            <span class="menu-icon">
                <i class="mdi mdi-dns"></i>
            </span>
            <span class="menu-title text-light">Payment Date</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="payment">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item {{ Request::routeIs('billdate.create') ? 'active' : '' }}"> <a class="nav-link text-light" href="{{ route('billdate.create') }}">Company
                        Billdate Create </a></li>
            </ul>
        </div>
    </li>
    @endif

</ul>
