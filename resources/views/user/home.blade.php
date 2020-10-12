@extends('layouts.user')
@section('home')
<div class="jl_post_loop_wrapper">
    <div class="container" id="">
        <div class="row">
            <div class="col-md-8 grid-sidebar" id="content">
                <div class="jl_wrapper_cat">
                    <div id="" class="pagination_infinite_style_cat ">
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
                                            @if (Auth::check() && $author->id == Auth::user()->id)
                                            <span class="meta-category-small">
                                                {{ $post->status==config('common.post.status_accepted') ? trans('app.post.accepted') : ($post->status==config('common.post.status_waiting') ? trans('app.post.waiting') :
                                                trans('app.post.rejected')) }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $posts->links('vendor.pagination.default') }}
                </div>
                <div class="brack_space"></div>
            </div>
            <div class="col-md-4" id="sidebar">
                <div id="disto_recent_post_widget-7" class="widget post_list_widget">
                    <div class="widget-title">
                        <h2>{{ trans('app.recent_posts') }}</h2>
                    </div>
                    <div>
                        <ul class="feature-post-list recent-post-widget">
                            @foreach($hotPosts as $hostPost)
                            <li>
                                <a href="{{ route('post.show', ['slug' => $hostPost->slug]) }}" class="jl_small_format feature-image-link image_post featured-thumbnail" title="{{ $hostPost->title }}">
                                    <img src="{{ URL::asset($hostPost->thumbnail) }}" alt="{{ $hostPost->slug }}" />
                                    <div class="background_over_image"></div>
                                </a>
                                <div class="item-details">
                                    <span class="meta-category-small"><a class="post-category-color-text" href="#">{{ $hostPost->category->name }}</a></span>
                                    <h3 class="feature-post-title"><a href="{{ route('post.show', ['slug' => $hostPost->slug]) }}">{{ $hostPost->title }}</a></h3>
                                    <span class="post-meta meta-main-img auto_image_with_date">
                                        <span class="post-date"><i class="fa fa-clock-o"></i>{{ $hostPost->created_at }}</span>
                                    </span>
                                </div>
                                <div class="brack_space"></div>
                            </li>
                            <span class="jl_none_space"></span>
                            @endforeach
                        </ul>
                    </div>
                    <span class="jl_none_space"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content -->
@endsection
