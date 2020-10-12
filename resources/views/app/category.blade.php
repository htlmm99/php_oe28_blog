@extends('layouts.app')

@section('main_content')
    <div class="main_title_wrapper category_title_section jl_cat_img_bg">
        <div class="category_image_bg_image">
            <img src="{{ asset(config('images.category')) }}">
        </div>
        <div class="category_image_bg_ov"></div>
        <div class="jl_cat_title_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 main_title_col">
                        <div class="jl_cat_mid_title">
                            <h2 class="categories-title">{{ trans('app.categories') }}</h2>
                            <h3 class="categories-title title">{{ $category->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="jl_post_loop_wrapper jl_grid_4col_home">
        <div class="container" id="wrapper_masonry">
            <div class="row">
                <div class="col-md-12 grid-sidebar">
                    <div class="jl_wrapper_cat">
                        <div id="content_masonry">
                            <!-- data test -->
                            @foreach($posts as $post)
                        <div class="box jl_grid_layout1 blog_grid_post_style post-4761 post type-post status-publish format-standard has-post-thumbnail hentry category-sports">
                            <div class="post_grid_content_wrapper">
                                <div class="image-post-thumb">
                                    <a href="{{ route('post.show', ['slug' => $post->slug]) }}" class="link_image featured-thumbnail" title="{{ $post->title }}">
                                        <img src=" {{ URL::asset($post->thumbnail) }}" class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image" alt="{{ $post->slug }}" >
                                        <div class="background_over_image"></div>
                                    </a>
                                    <span class="meta-category-small"><a class="post-category-color-text" href="{{ route('category.show', $post->category->name) }}">{{ $post->category->name }}</a></span>
                                </div>
                                <div class="post-entry-content">
                                    <div class="post-entry-content-wrapper">
                                        <div class="large_post_content">
                                            <h3 class="image-post-title"><a href="{{ route('post.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
                                            <span class="jl_post_meta" ><span class="jl_author_img_w"><a href="{{ route('user.home', explode('@',$post->user->email)[0]) }}" title="{{ $post->user->username }}" rel="">{{ $post->user->username }}</a></span><span class="post-date"><i class="fa fa-clock-o"></i>{{ $post->created_at }}</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                        {{ $posts->links('vendor.pagination.default') }}
                    </div>
                  <!--end data test -->
              </div>
          </div>
      </div>
    </div>
@endsection
