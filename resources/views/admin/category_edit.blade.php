@extends('layouts.admin')
@section('main_content')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">{{ trans('app.category.category_management') }}</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
            <li class="breadcrumb-item active">{{ trans('app.categories') }}</li>
        </ol>
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                {{ trans('app.category.edit_category') }}
            </div>
            <div class="card-body">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('category.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{ trans('app.category.category_name') }}</label>
                                        <input type="text" class="form-control" name="name" placeholder="{{ $category->name }}"
                                        >
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('app.category.category_parent') }}</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="{{ config('common.category.category_default') }}">{{ trans('app.category.category_parent') }}</option>
                                            {{!! $htmlOption !!}}
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
