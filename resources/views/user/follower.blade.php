@extends('layouts.user')
@section('home')
<div class="jl_post_loop_wrapper">
    <div class="container" id="">
        <div class="row">
            <div class="col-md-8 grid-sidebar" id="content">
                <div class="jl_wrapper_cat">
                    <h4>{{ trans('app.follower') }}</h4>
                    <table class="table">
                        <tbody>
                            @foreach($followers as $follower)
                            <tr>
                                <th scope="row">1</th>
                                <td><a href="{{ route('user.home', explode('@',$follower->email)[0]) }}">{{ $follower->username }}</a></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><div class="index">
                                    <form action="{{ route('user.follow') }}" method="post" id="followForm" class="followForm">
                                        @csrf
                                        <a id="follower" class="btn btn-round btn-default btn-follow-fix follower-fix" hidden="true">
                                        </a>
                                        <input id="author_id" name="author_id" value="{{ $author->id }}" hidden="true" />
                                        <input id="following_id" name="following_id" value="{{ Auth::id() }}" hidden="true" />
                                        <input id="checkLogin" name="checkLogin" value="{{ Auth::check() }}" hidden="true" />
                                        <input id="youNeedLogin" name="youNeedLogin" value="{{ trans('app.you_need_login') }}" hidden="true" />
                                        @if($checkFollow)
                                        <button type="submit" class="btn btn-primary btn-follow-fix1 follower-fix">{{ trans('app.following') }}</button>
                                        @else
                                        <button type="submit" class="btn btn-primary btn-follow-fix1 follower-fix">{{ trans('app.follow') }}</button>
                                        @endif
                                    </form>
                                </div></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="brack_space"></div>
            </div>
            <div class="col-md-4" id="sidebar">
                <div class="statistic clearfix widget post_list_widget follow-fix">
                    @if($author->id != Auth::id())
                    <div class="index">
                        <form action="{{ route('user.follow') }}" method="post" id="followForm" class="followForm">
                            @csrf
                            <a id="follower" class="btn btn-round btn-default btn-follow-fix follower-fix" hidden="true">
                                Theo dõi
                            </a>
                            <input id="author_id" name="author_id" value="{{ $author->id }}" hidden="true" />
                            <input id="following_id" name="following_id" value="{{ Auth::id() }}" hidden="true" />
                            <input id="checkLogin" name="checkLogin" value="{{ Auth::check() }}" hidden="true" />
                            <input id="youNeedLogin" name="youNeedLogin" value="{{ trans('app.you_need_login') }}" hidden="true" />
                            @if($checkFollow)
                            <button type="submit" class="btn btn-primary btn-follow-fix follower-fix">{{ trans('app.following') }}</button>
                            @else
                            <button type="submit" class="btn btn-primary btn-follow-fix follower-fix">{{ trans('app.follow') }}</button>
                            @endif
                        </form>
                    </div>
                    @endif
                    <div class="index">
                        <span class="count">{{ $author->followers()->count() }}</span>
                        <a class="follower-fix" href="{{ route('user.follower', explode('@',$author->email)[0]) }}"><h5 class="follower-fix">{{ trans('app.follower') }}</h5></a>
                    </div>
                    <div class="index">
                        <span class="count">{{ $author->following()->count() }}</span>
                        <h5  class="follower-fix"><a href="{{ route('user.following', explode('@',$author->email)[0]) }}">{{ trans('app.following') }}</a></h5>
                    </div>
                </div>
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
