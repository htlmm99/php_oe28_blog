@extends('layouts.user')

@section('home')
      <div class="jl_post_loop_wrapper">
        <div class="container" id="wrapper_masonry">
          <div class="row">
            <div class="col-md-8 grid-sidebar" id="content">
              <div class="jl_wrapper_cat">
                <div id="content_masonry" class="pagination_infinite_style_cat ">
                </div>
              </div>
            </div>
            @include('layouts.sidebar')
          </div>
        </div>
      </div>
      <!-- end content -->
@endsection
