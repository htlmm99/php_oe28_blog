@extends('layouts.user')

@section('home')
      <div class="jl_post_loop_wrapper">
        <div class="container" id="wrapper_masonry">
          <div class="row">
            <div class="col-md-8 grid-sidebar" id="content">
              <div class="jl_wrapper_cat">
                <div id="content_masonry" class="pagination_infinite_style_cat ">
                  @foreach($posts as $post)
                     <div class="box jl_grid_layout1 blog_grid_post_style post-4761 post type-post status-publish format-standard has-post-thumbnail hentry category-sports" data-aos="fade-up">
                       <div class="post_grid_content_wrapper">
                         <div class="image-post-thumb">
                           <a href="#" class="link_image featured-thumbnail" title="{{ $post->title }}">
                             <img src="{{ $post->thumbnail }}" class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image" alt="" />
                             <div class="background_over_image"></div>
                           </a>
                           <span class="meta-category-small"><a class="post-category-color-text" href="#">{{ $post->category }}</a></span>
                         </div>
                         <div class="post-entry-content">
                           <div class="post-entry-content-wrapper">
                             <div class="large_post_content">
                               <h3 class="image-post-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
                               <span class="jl_post_meta" ><span class="jl_author_img_w"><a href="#" title="post by {{ $author->username }}" rel="author">{{ $author->username }}</a></span><span class="post-date"><i class="fa fa-clock-o"></i>{{ $post->created_at }}</span></span>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                  @endforeach
                </div>
                <nav class="jellywp_pagination">
                        <ul class="page-numbers">
                          <li><span aria-current="page" class="page-numbers current">1</span></li>
                          <li><a class="page-numbers" href="#">2</a></li>
                          <li><a class="page-numbers" href="#">3</a></li>
                          <li><span class="page-numbers dots">&hellip;</span></li>
                          <li><a class="page-numbers" href="#">6</a></li>
                          <li><a class="next page-numbers" href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                      </ul>
                  </nav>
              </div>
            </div>

            @include('layouts.sidebar')

          </div>
        </div>
      </div>
      <!-- end content -->
@endsection
