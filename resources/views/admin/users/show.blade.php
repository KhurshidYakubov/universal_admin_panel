@extends('layouts.admin')
@section('content')

    <div id="wrapper">
        @include('admin.components.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('admin.components.navbar')

                <div class="container-fluid">
                    @include('admin.components.flash-message')

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.user') }} #{{ $user->id }}</h1>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            <a href="{{route('users.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i></a>
                            <a href="{{ route('users.index') }}"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-list"></i>
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
                    </div>

                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>{{ __('main.id') }}:</td>
                            <th scope="row">{{ $user->id}}</th>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <th scope="row">{{ $user->username}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.fio') }}:</td>
                            <th scope="row">{{ $user->first_name ?? __('main.not_set')}} {{ $user->last_name ?? __('main.not_set')}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.email') }}:</td>
                            <th scope="row">{{ $user->email }}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.role') }}:</td>
                            <th scope="row">{{ $user->role }}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.status') }}:</td>
                            @if($user->status == 0)
                                <th scope="row">{{ __('main.inactive') ?? '' }}</th>
                            @elseif($user->status == 1)
                                <th scope="row">{{ __('main.active') ?? ''}}</th>
                            @endif
                        </tr>
                        <tr>
                            <td>{{ __('main.created_at') }}:</td>
                            <th scope="row">{{ $user->created_at->format('d.m.Y | H:m:i') }}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.updated_at') }}:</td>
                            <th scope="row">{{ $user->updated_at->format('d.m.Y | H:m:i') }}</th>
                        </tr>

                        </tbody>
                    </table>
                </div>
@endsection
