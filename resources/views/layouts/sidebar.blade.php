<div class="col-md-4" id="sidebar">
  <div id="socialcountplus-2" class="widget widget_socialcountplus">
    <div class="social-count-plus">
      <div class="statistic clearfix" id="sidebar_follower">
        <div class="index">
          <a>
            <span class="count">55</span>
            <span><strong>{{ trans('app.follower') }}</strong></span>
          </a>
        </div>
        <div class="index">
          <a>
            <span class="count">55</span>
            <span><strong>{{ trans('app.following') }}</strong></span>
          </a>
        </div>
        <div class="index">
          <a>
            <span class="count">55</span>
            <span><strong>{{ trans('app.posts') }}</strong></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <span class="jl_none_space"></span>
  <div id="disto_recent_post_widget-7" class="widget post_list_widget">
    <div class="widget_jl_wrapper"><span class="jl_none_space"></span>
      <div class="widget-title">
        <h2>{{ trans('app.recent_posts') }}</h2>
      </div>
      <div>
        <ul class="feature-post-list recent-post-widget">
          @for ($j = 1; $j < 4; $j++)
            <li>
              <a href="#" class="jl_small_format feature-image-link image_post featured-thumbnail" title="Sitting right here waiting for you come to me">
                <img src="http://jellywp.com/theme/disto/demo/wp-content/uploads/2019/02/sawyer-bengtson-1331688-unsplash-120x120.jpg" alt="" />
                <div class="background_over_image"></div>
              </a>
              <div class="item-details">
                <span class="meta-category-small"><a class="post-category-color-text" href="#">Techno</a></span>
                <h3 class="feature-post-title"><a href="#">
                Sitting right here waiting for you come to me</a></h3>
                <span class="post-meta meta-main-img auto_image_with_date">
                  <span class="post-date"><i class="fa fa-clock-o"></i>Dec 24, 2016</span></span>
              </div>
            </li>
          @endfor
        </ul>
      </div>
      <span class="jl_none_space"></span>
    </div>
  </div><span class="jl_none_space"></span>
  <div id="disto_recent_large_slider_widgets-5" class="widget jl_widget_slider">
    <div class="slider_widget_post jelly_loading_pro">
      @for ($i = 1; $i < 4; $i++)
        <div class="recent_post_large_widget"> <span class="image_grid_header_absolute" style="background-image: url('http://jellywp.com/theme/disto/demo/wp-content/uploads/2018/11/marvin-tolentino-680683-unsplash-380x350.jpg')"></span>
          <a href="#" class="link_grid_header_absolute" title="Standing right here and singing until the mid"></a> <span class="meta-category-small"><a class="post-category-color-text" href="#">Active</a></span>
          <div class="wrap_box_style_main image-post-title">
            <h3 class="image-post-title"><a href="#">
            Standing right here and singing until the mid</a></h3>
            <span class="jl_post_meta" ><span class="jl_author_img_w"><<a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a></span><span class="post-date"><i class="fa fa-clock-o"></i>Dec 23, 2016</span></span>
          </div>
        </div>
      @endfor
    </div>
    <span class="jl_none_space"></span>
  </div>
</div>
