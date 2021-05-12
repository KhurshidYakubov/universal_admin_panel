@extends('layouts.admin')
@section('content')
    <div id="wrapper">
        @include('admin.components.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('admin.components.navbar')
                <div class="container-fluid">
                    @include('admin.components.flash-message')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('main.users') }}</h1>
                            <a href="{{route('users.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i> {{ __('main.add') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <form action="{{ route('users.index') }}" method="GET" id='myform'>
                                        @csrf
                                        <tr>
                                            <th scope="col">{{ __('main.id') }}</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">{{ __('main.fio') }}</th>
                                            <th scope="col">{{ __('main.email') }}</th>
                                            <th scope="col">{{ __( 'main.role') }}</th>
                                            <th scope="col">{{ __( 'main.status') }}</th>
                                            <th scope="col">{{ __( 'main.manage') }}</th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type="number" class="form-control" name="id_filter"
                                                       style="width: 70px; margin: 0 auto;">
                                            </th>
                                            <th>
                                                <input type="text" class="form-control" name="username_filter">
                                            </th>
                                            <th>
                                                <input type="text" class="form-control" name="name_filter">
                                            </th>
                                            <th>
                                                <input type="text" class="form-control" name="email_filter">
                                            </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <button type="submit" hidden></button>
                                    </form>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            @if($user->status == 0)
                                                <td>{{ __('main.inactive') ?? '' }}</td>
                                            @elseif($user->status == 1)
                                                <td>{{ __('main.active') ?? ''}}</td>
                                            @endif
                                            <td>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    <a href="{{ route('users.show', $user->id) }}"
                                                       class="btn btn-success btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                       class="btn btn-info btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Delete" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$users->links('admin.components.pagination')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
