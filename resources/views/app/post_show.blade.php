@extends('layouts.app')
@section('main_content')
<div class="jl_single_style4">
    <div class="single_content_header single_captions_overlay_bottom_image_full_width">
        <div class="image-post-thumb"><img src="{{ $post->thumnail }}"></div>
        <div class="single_full_breadcrumbs_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
        <div class="single_post_entry_content_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single_post_entry_content">
                            <span class="meta-category-small"><a class="post-category-color-text" id="post-category" href="#">{{$post->category->name}}</a></span>
                            <h1 class="single_post_title_main">{{ $post->title }}</h1>
                            <span class="single-post-meta-wrapper">
                                <span class="post-author"><span><a href="" rel="author">{{ $post->user->username }}</a></span></span>
                                <span class="post-date updated"><i class="fa fa-clock-o"></i>{{ $post->created_at }}</span>
                                <span class="meta-comment"><i class="fa fa-comment"></i><a href="#">{{ trans('app.comment') }}</a></span>
                                <a href="#" class="jm-post-like" data-post_id="2961" title="{{ trans('app.post.like') }}"><i class="fa fa-heart-o"></i></a><span class="view_options"><i class="fa fa-eye"></i></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content_main" class="clearfix jl_spost">
<div class="container">
    <div class="row main_content">
        <div class="col-md-8  loop-large-post" id="content">
            <div class="widget_container content_page">
                <!-- start post -->
                <div class="post-2961 post type-post status-publish format-standard has-post-thumbnail hentry category-sports tag-inspire tag-relaxing tag-shooting" id="post-2961">
                    <div class="single_section_content box blog_large_post_style">
                        <div class="post_content">
                            {!! $post->content !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="single_tag_share">
                            <div class="tag-cat">
                                <ul class="single_post_tag_layout">
                                    <!--forelse($post->tag ?? '' as $tag)
                                    <li><a href="#" rel="tag"></a></li>
                                    empty
                                    endforelse -->
                                </ul>
                            </div>
                            <div class="single_post_share_icons"><a id="share" href="">Share<i class="fa fa-share-alt"></i></a></div>
                        </div>
                        <div class="single_post_share_wrapper">
                            <div class="single_post_share_icons social_popup_close"><i class="fa fa-close"></i></div>
                            <ul class="single_post_share_icon_post">
                                <li class="single_post_share_facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li class="single_post_share_twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li class="single_post_share_linkedin"><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li class="single_post_share_ftumblr"><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                            </ul>
                        </div>
                        <div class="related-posts">
                            <h4>Related Articles</h4>
                            <div class="single_related_post">
                                <div class="jl_related_feature_items">
                                    <div class="jl_related_feature_items_in">
                                        <div class="image-post-thumb">
                                            <a href="#" class="link_image featured-thumbnail" title="Round white dining table on brown hardwood">
                                                <img src="daniel-korpai-1296140-unsplash-780x450.jpg" class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image" alt="" />
                                                <div class="background_over_image"></div>
                                            </a>
                                        </div>
                                        <span class="meta-category-small"><a class="post-category-color-text" href="#">Sports</a></span>
                                        <div class="post-entry-content">
                                            <h3 class="jl-post-title"><a href="#">Round white dining table on brown hardwood</a></h3>
                                            <span class="jl_post_meta">
                                                <span class="jl_author_img_w"><a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a></span>
                                                <span class="post-date"><i class="fa fa-clock-o"></i>Mar 10, 2019</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear_2col_related"></div>
                                <div class="jl_related_feature_items">
                                    <div class="jl_related_feature_items_in">
                                        <div class="image-post-thumb">
                                            <a href="#" class="link_image featured-thumbnail" title="10 best place for your travel around the world">
                                                <img src="daniel-korpai-1435296-unsplash-780x450.jpg" class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image" alt="" />
                                                <div class="background_over_image"></div>
                                            </a>
                                        </div>
                                        <span class="meta-category-small"><a class="post-category-color-text" href="#">Sports</a></span>
                                        <span class="jl_post_type_icon"><i class="la la-camera"></i></span>
                                        <div class="post-entry-content">
                                            <h3 class="jl-post-title"><a href="#">10 best place for your travel around the world</a></h3>
                                            <span class="jl_post_meta">
                                                <span class="jl_author_img_w"><a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a></span>
                                                <span class="post-date"><i class="fa fa-clock-o"></i>Dec 24, 2016</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear_3col_related"></div>
                                <div class="jl_related_feature_items">
                                    <div class="jl_related_feature_items_in">
                                        <div class="image-post-thumb">
                                            <a href="#" class="link_image featured-thumbnail" title="Enjoy your work and do what ever you want">
                                                <img width="780" height="450" src="ashley-knedler-90856-unsplash-780x450.jpg" tppabs="http://jellywp.com/theme/disto/demo/wp-content/uploads/2019/02/ashley-knedler-90856-unsplash-780x450.jpg" class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image" alt="" />                                                    <div class="background_over_image"></div>
                                            </a>
                                        </div>
                                        <span class="meta-category-small"><a class="post-category-color-text" style="background:#36c942" href="#">Sports</a></span><span class="jl_post_type_icon"><i class="la la-play-circle"></i></span>
                                        <div class="post-entry-content">
                                            <h3 class="jl-post-title"><a href="#">
                                            Enjoy your work and do what ever you want</a></h3>
                                            <span class="jl_post_meta"><span class="jl_author_img_w"><img src="favicon.jpg" tppabs="http://jellywp.com/disto-preview/img/favicon.jpg" width="30" height="30" alt="Anna Nikova" class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo" /><a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a></span><span class="post-date"><i class="fa fa-clock-o"></i>Dec 24, 2016</span></span>                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear_2col_related"></div>                                                                    </div>
                                </div>
                                <!-- comment -->
                                <div id="respond" class="comment-respond">
                                    <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a></small></h3>
                                    <form action="#" method="post" id="commentform" class="comment-form">
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                    </p>
                                    <p class="comment-form-comment">
                                        <textarea class="u-full-width" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Comment"></textarea>
                                    </p>
                                    <div class="form-fields row"><span class="comment-form-author col-md-4"><input id="author" name="author" type="text" value="" size="30" placeholder="Fullname"></span>
                                    <span class="comment-form-email col-md-4"><input id="email" name="email" type="text" value="" size="30" placeholder="Email Address"></span>
                                    <span class="comment-form-url col-md-4"><input id="url" name="url" type="text" value="" size="30" placeholder="Web URL"></span>
                                </div>
                                <p class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
                                </p>
                            </form>
                            </div><!-- #respond -->
                        </div>
                    </div>
                    <!-- end post -->
                    <div class="brack_space"></div>
                </div>
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
</section>
@endsection
