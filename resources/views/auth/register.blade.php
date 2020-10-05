@extends('layouts.app')
@section('main_content')
    <div class="main_title_wrapper category_title_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 main_title_col">
                    <div class="jl_cat_mid_title">
                        <h3 class="categories-title title">{{ trans('auth.register') }}</h3>
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
                                                <div class="card-header">{{ trans('auth.register') }}</div>
                                                <div class="card-body">
                                                    <form method="POST" action="{{ route('register') }}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ trans('app.your_email') }} * </label>
                                                            <div class="col-md-6">
                                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('auth.password') }} * </label>
                                                            <div class="col-md-6">
                                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ trans('auth.password_confirm') }} * </label>
                                                            <div class="col-md-6">
                                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ trans('app.your_name') }} * </label>
                                                            <div class="col-md-6">
                                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                                                @error('username')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ trans('app.your_phone') }} * </label>
                                                            <div class="col-md-6">
                                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                                                @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-md-6 offset-md-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                {{ trans('auth.register') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
