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
                            <h2 class="categories-title">{{ trans('app.tags') }}</h2>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
