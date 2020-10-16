@extends('layouts.admin')
@section('main_content')
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">{{ trans('app.user_management') }}</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item active">{{ trans('app.'.$name) }}</li>
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
                    @if ($name == config('common.role.user') )
                        {{ trans('app.list_user') }}
                    @else
                        {{ trans('app.list_admin') }}
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="d-flex">
                                    <th class="col-1">STT</th>
                                    <th class="col-2">{{ trans('app.username') }}</th>
                                    <th class="col-2">{{ trans('app.phone') }}</th>
                                    <th class="col-3">{{ trans('app.email') }}</th>
                                    <th class="col-2">{{ trans('app.date_start') }}</th>
                                    <th class="col-2">{{ trans('app.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($users as $user)
                                    <tr class="d-flex">
                                        <td class="col-1">{{ $i++ }}</td>
                                        <td class="col-2">{{ $user->username }}</td>
                                        <td class="col-2">{{ $user->phone }}</td>
                                        <td class="col-3">{{ $user->email }}</td>
                                        <td class="col-2">{{ $user->created_at ?? '' }}</td>
                                        <td class="col-2">
                                            <form class="delete" action="{{ route('admin.edit', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                @if ($name == config('common.role.user'))
                                                    <input type="text" name="role" value="{{ config('common.role.admin') }}" hidden="true">
                                                    <button id="btn-delete" class="btn btn-success float-left" type="submit">
                                                        +A
                                                    </button>
                                                @else
                                                    <input type="text" name="role" value="{{ config('common.role.user') }}" hidden="true">
                                                    <button id="btn-delete" class="btn btn-success float-left" type="submit">
                                                        -A
                                                    </button>
                                                @endif
                                            </form>
                                            <form class="delete" action="{{ route('user.delete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="btn-delete" class="btn btn-danger float" type="submit">
                                                <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
