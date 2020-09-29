@extends('layouts.app')
@section('main_content')
<div class="main_title_wrapper category_title_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main_title_col">
                <div class="jl_cat_mid_title">
                    <h3 class="categories-title title">{{ trans('app.your_account') }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section id="content_main" class="clearfix">
                <div class="container">
                    <div class="row main_content">
                        <!-- begin content -->
                        <div class="page-full col-md-12 post-3938 page type-page status-publish hentry" id="content">
                            <div class="content_single_page post-3938 page type-page status-publish hentry">
                                <div class="content_page_padding">
                                    <div class="woocommerce">
                                        <div class="card">
                                            <div class="card-header">{{ trans('auth.login') }}</div>
                                            <div class="card-body">
                                                <form class="woocommerce-form woocommerce-form-login login" method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                                        <div class="col-md-6">
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('auth.password') }}</label>
                                                        <div class="col-md-6">
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="remember">
                                                                    {{ trans('auth.remember_me') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-8 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                            {{ trans('auth.login') }}
                                                            </button>
                                                            @if (Route::has('password.request'))
                                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                    {{ trans('auth.forgot_password') }}
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brack_space"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
