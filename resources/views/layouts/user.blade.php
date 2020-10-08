@extends('layouts.app')

@section('main_content')
      <div class="main_title_wrapper jl_na_bg_title">
        <div class="container">
          <div class="row">
            <div class="col-md-12 main_title_col">
              <div class="jl_cat_mid_title">
                <h1 class="categories-title title">{{ trans('app.author') }}</h1>
                <h1 class="categories-title title">{{ $user->username ?? '' }}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      @yield('home');
@endsection
