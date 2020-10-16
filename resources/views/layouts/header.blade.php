<!-- Start header -->
<header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style3_custom jl_cusdate_head">
    <div class="header_top_bar_wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="menu-primary-container navigation_wrapper">
                        <ul id="jl_top_menu" class="jl_main_menu">
                            <li class="menu-item menu-item-home current-menu-item page_item page-item-4212 current_page_item menu-item-4461"><a href="{{ route('home') }}" aria-current="page">{{ trans('app.home') }}<span class="border-menu"></span></a></li>
                            @if (!Auth::check())
                                <li class="menu-item menu-item-3602"><a href="{{ route('login') }}">{{ trans('auth.login') }}<span class="border-menu"></span></a></li>
                                <li class="menu-item menu-item-3606"><a href="{{ route('register') }}">{{ trans('auth.register') }}<span class="border-menu"></span></a></li>
                            @else
                                <li class="menu-item menu-item-3602"><a href="{{ route('user.profile') }}">{{ trans('app.welcome') }}  : {{ Auth()->user()->username}}<span class="border-menu"></span></a></li>
                                <li class="menu-item menu-item-3606">
                                    <a id='btn-logout'>{{ trans('auth.logout') }}<span class="border-menu"></span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                                @if (Auth()->user()->role->name == config('common.role.admin'))
                                <li class="menu-item menu-item-3602"><a href="{{ route('admin') }}">{{ trans('app.admin') }}<span class="border-menu"></span></a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                    <!-- Data test -->
                    <div class="jl_top_bar_right menu-primary-container navigation_wrapper">
                        <ul id="jl_top_menu" class="jl_main_menu">
                            <li><span class="jl_current_title">{{ trans('app.current_date') }}</span>{{ $today ?? '' }}</li>
                            <li class="menu-item menu-item-3602"><a href="{{ route('lang', 'en') }}">{{ trans('app.english') }}<span class="border-menu"></span></a></li>
                            <li class="menu-item menu-item-3606"><a href="{{ route('lang', 'vi') }}">{{ trans('app.vietnamese') }}<span class="border-menu"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Main menu -->
    <div class="jl_blank_nav"></div>
    <div id="menu_wrapper" class="menu_wrapper jl_menu_sticky jl_stick ">
        <div class="container">
            <div class="row">
                <div class="main_menu col-md-12">
                    <div class="logo_small_wrapper_table">
                        <div class="logo_small_wrapper">
                            <!-- begin logo -->
                            <a class="logo_link" href="{{ route('home') }}">
                                <img src="{{ asset(config('images.logo')) }}" />
                            </a>
                            <!-- end logo -->
                        </div>
                    </div>
                    <!-- main menu -->
                    <div class="menu-primary-container navigation_wrapper col-md-8">
                        <ul id="mainmenu" class="jl_main_menu">
                            <li class="menu-item"> <a href="{{ route('home') }}">{{ trans('app.home') }}<span class="border-menu"></span></a></li>
                            <li class="menu-item menu-item-has-children"><a href="#">{{ trans('app.categories') }}<span class="border-menu"></span></a></li>
                            <li class="menu-item"><a href="">{{ trans('app.top_members') }}<span class="border-menu"></span></a></li>
                            <li class="menu-item"><a href="">{{ trans('app.contact') }}<span class="border-menu"></span></a></li>
                        </ul>
                    </div>
                    <!-- end main menu -->
                    <div class="search_header_menu col-md-4">
                        <form method="get" class="searchform_theme" action="#">
                            <input type="text" placeholder="{{ trans('app.search') }}" value="" name="s" class="search_btn" />
                            <button type="submit" class="button"><i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
