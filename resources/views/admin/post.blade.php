@extends('layouts.admin')
@section('main_content')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">{{ trans('app.post.post_management') }}</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
            <li class="breadcrumb-item active">{{ trans('app.post') }}</li>
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
                {{ trans('app.post.list_posts') }}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="d-flex">
                                <th class="col-1">STT</th>
                                <th class="col-3">{{ trans('app.post.title') }}</th>
                                <th class="col-2">{{ trans('app.post.category') }}</th>
                                <th class="col-2">{{ trans('app.post.author') }}</th>
                                <th class="col-2">{{ trans('app.post.status') }}</th>
                                <th class="col-2">{{ trans('app.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($posts as $post)
                            <tr class="d-flex">
                                <td class="col-1">{{ $i++ }}</td>
                                <td class="col-3">{{ $post->title }}</td>
                                <td class="col-2">{{ $post->category->name }}</td>
                                <td class="col-2">{{ $post->user->username }}</td>
                                <td class="col-2">{{ $post->status }}</td>
                                <td class="col-2">
                                    <div class="btn-group">
                                        <a href="{{ route('post.show', ['slug' => $post->slug]) }}">
                                            <button class="btn btn-info float-left" type="submit">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <form class="delete" action="{{ route('admin.post.accept', $post->id) }}" method="POSt">
                                            @csrf
                                            @method('PATCH')
                                            <button id="btn-delete" class="btn btn-danger float" type="submit">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <form class="delete" action="{{ route('admin.post.reject', $post->id) }}" method="POSt">
                                            @csrf
                                            @method('PATCH')
                                            <button id="btn-delete" class="btn btn-danger float" type="submit">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <form class="delete" action="" method="POSt">
                                            @csrf
                                            @method('DELETE')
                                            <button id="btn-delete" class="btn btn-danger float" type="submit">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</main>
@endsection
