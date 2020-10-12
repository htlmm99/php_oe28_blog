@extends('layouts.user')
@section('home')
<section id="content_main" class="clearfix jl_spost">
    <div class="container">
        <div class="row main_content">
            <div class="col-md-8  loop-large-post" id="content">
                <div class="widget_container content_page">
                    <!-- start post -->
                    <div class="post-2800 post type-post status-publish format-standard has-post-thumbnail hentry category-crazy tag-food tag-inspiration" id="post-2800">
                        <div class="single_section_content box blog_large_post_style">
                            <div class="jl_single_style1">
                                <div class="single_content_header jl_single_feature_above">
                                </div>
                                <div class="single_post_entry_content single_bellow_left_align">
                                    @if ($post->user->id == Auth::id())
                                    <a href="{{ route('post.edit', $post->id) }}">
                                        <button class="btn float-right" type="submit" title="{{ trans('app.edit') }}">{{ trans('app.edit') }}
                                        </button>
                                    </a>
                                    @endif
                                    <span class="meta-category-small single_meta_category"><a class="post-category-color-text" href="{{ route('category.show', $post->category->name) }}">{{ $post->category->name }}</a></span>
                                    <h1 class="single_post_title_main">{{ $post->title }}</h1>
                                    <span class="single-post-meta-wrapper">
                                        <span class="post-author"><span><a href="{{ route('user.home', explode('@',$post->user->email)[0]) }}" title="" rel="author">{{ $post->user->username }}</a></span></span>
                                        <span class="post-date updated"><i class="fa fa-clock-o"></i>{{ $post->created_at }}</span>
                                        <span class="meta-comment"><i class="fa fa-comment"></i><a href="#">{{ trans('app.comment') }}</a></span>
                                        <a href="#" class="jm-post-like" data-post_id="2800" title=""><i class="fa fa-heart-o"></i></a>
                                        <span class="view_options"><i class="fa fa-eye"></i></span>
                                    </span>
                                </div>
                            </div>
                            <div class="post_content">
                                {!! $post->content !!}
                            </div>
                            <div class="clearfix"></div>
                            <div class="single_tag_share">
                                <div class="tag-cat">
                                    <ul class="single_post_tag_layout">
                                        @forelse($post->tags as $tag)
                                        <li><a href="" rel="tag">{{ $tag->name }}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="single_post_share_icons">
                                    {{ trans('app.share') }}<i class="fa fa-share-alt"></i>
                                </div>
                            </div>
                            <div class="single_post_share_wrapper">
                                <div class="single_post_share_icons social_popup_close"><i class="fa fa-close"></i></div>
                                <ul class="single_post_share_icon_post">
                                    <li class="single_post_share_facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                            <div class="related-posts">
                                <h4>{{ trans('app.post.related') }}</h4>
                                <div class="single_related_post">
                                    @foreach($relatedPosts as $relatedPost)
                                    <div class="jl_related_feature_items">
                                        <div class="jl_related_feature_items_in">
                                            <div class="image-post-thumb">
                                                <a href="" class="link_image featured-thumbnail" title="{{ $relatedPost->slug }}">
                                                    <img src="{{ URL::asset($relatedPost->thumbnail) }}" class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image" alt="" />
                                                    <div class="background_over_image"></div>
                                                </a>
                                            </div>
                                            <span class="meta-category-small"><a class="post-category-color-text" href="{{ route('category.show', $relatedPost->category->name) }}">{{ $relatedPost->category->name }}</a></span>
                                            <div class="post-entry-content">
                                                <h3 class="jl-post-title"><a href="{{ route('post.show', ['slug' => $relatedPost->slug]) }}">{{ $relatedPost->title }}</a></h3>
                                                <span class="jl_post_meta">
                                                    <span class="jl_author_img_w"><a href="{{ route('user.home', explode('@',$relatedPost->user->email)[0]) }}" rel="author">{{ $relatedPost->user->username }}</a></span>
                                                    <span class="post-date"><i class="fa fa-clock-o"></i>{{ $relatedPost->created_at }}</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="clear_2col_related"></div>
                                    <div class="clear_3col_related"></div>
                                    <div class="clear_2col_related"></div>
                                </div>
                            </div>
                            <!-- comment -->
                            <div id="respond" class="comment-respond">
                                <h3 id="reply-title" class="comment-reply-title"> {{ trans('app.comment') }}</h3>
                                <form id="comment-post" class="comment-form" action="{{ route('comment.store') }}" method="post">
                                    @csrf
                                    <input type="text" name="user_id" id="user_id" value="{{ Auth::id() }}" hidden="true">
                                    <input type="text" name="post_id" id="post_id" value="{{ $post->id }}" hidden="true">
                                    <p class="comment-form-comment">
                                        <textarea class="u-full-width" id="content" name="content" aria-required="true" placeholder="Comment"></textarea>
                                    </p>
                                    <p class="form-submit">
                                        <input  name="submit" type="submit" id="submit" class="submit" value="{{ trans('app.comment') }}">
                                    </p>
                                </form>
                                <ul class="comment-list">
                                    @foreach($comments as $comment)
                                    <li id="comment-{{ $comment->id }}" class="comment byuser comment-author-meks2 even thread-even depth-1 parent">
                                        <article id="" class="comment-body-fix">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <b class=""><a href="" rel="" class="url">{{ $comment->user()->username }}</a></b>
                                                </div>
                                                <div class="comment-metadata">
                                                    <time datetime="">{{ $comment->created_at }}</time>
                                                </div>
                                            </footer>
                                            <div class="comment-content-fix">
                                                <p class="comment-p-fix">{{ $comment->content }}</p>
                                            </div>
                                            <div class="reply-fix">
                                                <form action="#" method="post" id="commentform" class="comment-form">
                                                    <a class="comment-reply-link" data-commentid="25" data-postid="177" data-belowelement="div-comment-25" data-respondelement="respond">{{ trans('app.reply') }}</a>
                                                    <p class="comment-form-comment">
                                                        <input class="u-full-width" id="comment" name="comment" aria-required="true" placeholder="" />
                                                    </p>
                                                </form>
                                            </div>
                                        </article>
                                        <ul class="children">
                                            <li id="comment-30" class="comment byuser comment-author-meks3 bypostauthor odd alt depth-2">
                                                <article id="" class="comment-body-fix">
                                                    <footer class="comment-meta">
                                                        <div class="comment-author vcard">
                                                            <b class="fn"><a href="" rel="" class="url">author</a></b>
                                                        </div>
                                                        <div class="comment-metadata">
                                                            <time datetime="2019-02-07T10:56:14+00:00">February 7, 2019 at 10:56 am</time>
                                                        </div>
                                                    </footer>
                                                    <div class="comment-content-fix">
                                                        <p class="comment-p-fix">Hey Jessica, I really like how you tackled this topic. Great stuff!</p>
                                                    </div>
                                                    <div class="reply-fix">
                                                        <form action="#" method="post" id="commentform" class="comment-form">
                                                            <a class="comment-reply-link" data-commentid="25" data-postid="177" data-belowelement="div-comment-25" data-respondelement="respond">Reply</a>
                                                            <p class="comment-form-comment">
                                                                <input class="u-full-width" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Comment" />
                                                            </p>
                                                        </form>
                                                    </div>
                                                </article>
                                            </li>
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="brack_space"></div>
                </div>
            </div>
            <div class="col-md-4" id="sidebar">
                <div id="disto_recent_post_widget-7" class="widget post_list_widget">
                    <div class="widget-title">
                        <h2>{{ trans('app.recent_posts') }}</h2>
                    </div>
                    <div>
                        <ul class="feature-post-list recent-post-widget">
                            @foreach($recentPosts as $recentPost)
                            <li>
                                <a href="{{ route('post.show', ['slug' => $recentPost->slug]) }}" class="jl_small_format feature-image-link image_post featured-thumbnail" title="{{ $recentPost->title }}">
                                    <img src="{{ URL::asset($recentPost->thumbnail) }}" alt="{{ $recentPost->slug }}" />
                                    <div class="background_over_image"></div>
                                </a>
                                <div class="item-details">
                                    <span class="meta-category-small"><a class="post-category-color-text" href="#">{{ $recentPost->category->name }}</a></span>
                                    <h3 class="feature-post-title"><a href="{{ route('post.show', ['slug' => $recentPost->slug]) }}">{{ $recentPost->title }}</a></h3>
                                    <span class="post-meta meta-main-img auto_image_with_date">
                                        <span class="post-date"><i class="fa fa-clock-o"></i>{{ $recentPost->created_at }}</span>
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
</section>
@endsection
