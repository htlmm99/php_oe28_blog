<!-- Start footer -->
<footer id="footer-container" class=" enable_footer_columns_dark">
    <div class="footer-columns">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="jl_none_space"></span>
                    <div id="disto_about_us_widget-3" class="widget jellywp_about_us_widget">
                        <div class="widget_jl_wrapper about_widget_content">
                            <span class="jl_none_space"></span>
                            <div class="widget-title">
                                <h2>{{ trans('app.about_us') }}</h2>
                            </div>
                            <div class="jellywp_about_us_widget_wrapper">
                                <p>{{ config('common.info.about') }}</p>
                                <div class="social_icons_widget">
                                    <ul class="social-icons-list-widget icons_about_widget_display">
                                        <li><a href="{{ config('common.soical.facebook') }}" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                                        <li><a href="{{ config('common.soical.youtube') }}" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        <li><a href="{{ config('common.soical.instagram') }}" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <span class="jl_none_space"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span class="jl_none_space"></span>
                    <div id="disto_recent_post_widget-3" class="widget post_list_widget">
                        <div class="widget_jl_wrapper">
                            <span class="jl_none_space"></span>
                            <div class="widget-title">
                                <h2>{{ trans('app.recent_posts') }}</h2>
                            </div>
                            <div>
                            </div>
                            <span class="jl_none_space"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="categories-4" class="widget widget_categories">
                        <div class="widget-title">
                            <h2>{{ trans('app.categories') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom enable_footer_copyright_dark">
        <div class="container">
            <div class="row bottom_footer_menu_text">
                <div class="col-md-6 footer-left-copyright">© {{ trans('app.copyright') }} </div>
                <div class="col-md-6 footer-menu-bottom">
                    <ul id="menu-footer-menu" class="menu-footer">
                        <li class="menu-item menu-item-10">
                            <a href="#">{{ trans('app.about_us') }}</a>
                        </li>
                        <li class="menu-item menu-item-11">
                            <a href="#">{{ trans('app.private_policy') }}</a>
                        </li>
                        <li class="menu-item menu-item-13">
                            <a href="#">{{ trans('app.community') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer -->
