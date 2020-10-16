@extends('layouts.user')
@section('home')
    <div class="jl_post_loop_wrapper">
        <div class="container" id="wrapper_masonry">
            <div class="row">
                <div class="col-md-8 grid-sidebar" id="content">
                    @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                    @endif
                    <form method="POST" action="{{ route('user.edit') }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ trans('app.your_email') }} * </label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus value="{{ $user->email }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ trans('app.your_name') }} * </label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username">
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
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">
                                <a class="change-password" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    {{ trans('app.change_password') }}
                                </a>
                            </label>
                            <input id="change-password" type="text" name="changePassword" value="{{ -config('common.user.change_pass') }}" hidden="true">
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ trans('auth.old_password') }} * </label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control required" name="oldPassword">
                                    @error('oldPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ trans('auth.password') }} * </label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control required" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right" >{{ trans('auth.password_confirm') }} * </label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    @error('password_confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 float-left">
                                <button id='edit-user' type="submit" class="btn btn-primary">
                                {{ trans('app.edit') }}
                                </button>
                                <button class="btn btn-danger">
                                <a class="btn" href="{{ route('home') }}">{{ trans('app.cancel') }}</a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
