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
                {{ trans('app.category.list_categories') }}
                <a href="{{ route('category.create') }}" class="float-right"><button class="btn-primary float-right" >{{ trans('app.category.add_category') }}</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="d-flex">
                                <th class="col-2">STT</th>
                                <th class="col-4">{{ trans('app.category.category_name') }}</th>
                                <th class="col-4">{{ trans('app.category.category_parent') }}</th>
                                <th class="col-2">{{ trans('app.action') }}</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr class="d-flex">
                            <th class="col-2">STT</th>
                            <th class="col-4">{{ trans('app.category.category_name') }}</th>
                            <th class="col-4">{{ trans('app.category.category_parent') }}</th>
                            <th class="col-2">{{ trans('app.action') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($categories as $category)
                            <tr class="d-flex">
                                <td class="col-2">{{ $i++ }}</td>
                                <th class="col-4">{{ $category->name }}</th>
                                <th class="col-4">{{ $category->name }}</th>
                                <td class="col-2">
                                    <div class="btn-group">
                                        <a href="{{ route('category.edit', $category->id) }}">
                                            <button class="btn btn-info float-left" type="submit">
                                            <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <form class="delete" action="{{ route('category.destroy', $category->id) }}" method="POSt">
                                            @csrf
                                            @method('DELETE')
                                            <button id="btn-delete" class="btn btn-danger float" type="submit">
                                            <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</main>
@endsection
