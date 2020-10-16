<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" >
    <a class="navbar-brand" href="{{ route('admin') }}">DISTO - ADMIN</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="{{ trans('app.search') }}" aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">{{ trans('app.your_account') }}</a>
                <a class="dropdown-item" href="{{ route('home') }}">{{ trans('app.home') }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('lang', 'en') }}">{{ trans('app.english') }}<span class="border-menu"></span></a>
                <a class="dropdown-item" href="{{ route('lang', 'vi') }}">{{ trans('app.vietnamese') }}<span class="border-menu"></span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" id='btn-logout'>{{ trans('auth.logout') }}<span class="border-menu"></span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
