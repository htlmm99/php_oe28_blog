<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="{{ route('admin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    {{ trans('app.dashboard') }}
                </a>
                <div class="sb-sidenav-menu-heading">{{ trans('app.user_management') }}</div>
                <a class="nav-link" href="{{ route('admin.index', 'user') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    {{ trans('app.list_user') }}
                </a>
                <a class="nav-link" href="{{ route('admin.index', 'admin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    {{ trans('app.list_admin') }}
                </a>
                <div class="sb-sidenav-menu-heading">{{ trans('app.post_management') }}</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    {{ trans('app.categories') }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">{{ trans('app.list_categories') }}</a>
                        <a class="nav-link" href="layout-sidenav-light.html">{{ trans('app.add_categories') }}</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    {{ trans('app.tags') }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">{{ trans('app.list_tags') }}</a>
                        <a class="nav-link" href="layout-sidenav-light.html">{{ trans('app.add_tags') }}</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    {{ trans('app.post') }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">{{ trans('app.recent_posts') }}</a>
                        <a class="nav-link" href="">{{ trans('app.review_posts') }}</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">{{ trans('app.welcome') }}</div>
            {{ Auth()->user()->username ?? '' }}
        </div>
    </nav>
</div>
