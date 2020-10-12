<!-- Start footer -->
<footer id="footer-container" class=" enable_footer_columns_dark">
    <div class="footer-columns">
        <div class="container">
            <div class="col-md-4"> <span class="jl_none_space"></span>
                <div id="disto_about_us_widget-3" class="widget jellywp_about_us_widget">
                    <div class="widget_jl_wrapper about_widget_content"> <span class="jl_none_space"></span>
                        <div class="widget-title">
                            <h2>{{ trans('app.about_us') }}</h2>
                        </div>
                        <div class="jellywp_about_us_widget_wrapper">
                            <p>{{ config('common.info.about') }}</p>
                            <div class="social_icons_widget">
                                <ul class="social-icons-list-widget icons_about_widget_display">
                                    <li><a href="{{ config('common.social.facebook') }}" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ config('common.social.youtube') }}" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="{{ config('common.social.instagram') }}" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
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
                    <div class="widget_jl_wrapper"> <span class="jl_none_space"></span>
                        <div class="widget-title">
                            <h2>{{ trans('app.recent_posts') }}</h2>
                        </div>
                        <div>
                            <!-- data test -->
                            <ul class="feature-post-list recent-post-widget">
                                @foreach($footerPost as $post)
                                <li>
                                    <a href="{{ route('post.show', ['slug' => $post->slug]) }}" class="jl_small_format feature-image-link image_post featured-thumbnail">
                                        <img src="{{ URL::asset($post->thumbnail) }}" class="attachment-disto_small_feature size-disto_small_feature wp-post-image" alt="{{ $post->slug }}" />
                                        <div class="background_over_image"></div>
                                    </a>
                                    <div class="item-details">
                                        <span class="meta-category-small">
                                            <a class="post-category-color-text" href="{{ route('category.client', $post->category->name) }}">{{ $post->category->name }}</a>
                                        </span>
                                        <h3 class="feature-post-title"><a href="{{ route('post.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
                                        <span class="post-meta meta-main-img auto_image_with_date">
                                            <span class="post-date"><i class="fa fa-clock-o"></i>{{ $post->created_at }}</span>
                                        </span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <!--end data test -->
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
                    <!-- data test -->
                    <ul>
                        @foreach($footerCategory as $category)
                        <li class="cat-item cat-item-2">
                            <a href="{{ route('category.client', $category->slug) }}">{{ $category->name }}</a>
                            <span>{{ $category->posts()->count() }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom enable_footer_copyright_dark">
        <div class="container">
            <div class="row bottom_footer_menu_text">
                <div class="col-md-6 footer-left-copyright">© Copyright 2019 Jellywp. All Rights Reserved Powered by Jellywp</div>
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
