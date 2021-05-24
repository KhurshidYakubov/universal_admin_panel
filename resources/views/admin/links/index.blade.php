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
                            <h1 class="h3 mb-0 text-gray-800">{{ __('main.links') }}</h1>
                            <a href="{{route('links.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i> {{ __('main.add') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <form action="{{ route('links.index') }}" method="GET" id='myform'>
                                        @csrf
                                        <tr>
                                            <th scope="col">{{ __('main.id') }}</th>
                                            <th scope="col">{{ __('main.link') }}</th>
                                            <th scope="col">{{ __('main.link_type') }}</th>
                                            <th scope="col">{{ __('main.creator') }}</th>
                                            <th scope="col">{{ __('main.modifier') }}</th>
                                            <th scope="col">{{ __( 'main.created_at') }}</th>
                                            <th scope="col">{{ __( 'main.updated_at') }}</th>
                                            <th scope="col">{{ __( 'main.manage') }}</th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type="number" class="form-control" name="id_filter"
                                                       style="width: 70px; margin: 0 auto;">
                                            </th>

                                            <th></th>
                                            <th></th>
                                            <th>
                                                <input type="text" class="form-control" name="creator_filter">
                                            </th>
                                            <th>
                                                <input type="text" class="form-control" name="modifier_filter">
                                            </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <button type="submit" hidden></button>
                                    </form>
                                    </thead>
                                    <tbody>
                                    @foreach($lists as $list)
                                        <tr>
                                            <th scope="row">{{ $list->id }}</th>
                                            <th scope="row">{{ $list->link }}</th>
                                            @if($list->link_type == 1)
                                                <th scope="row">{{ __('main.self') }}</th>
                                            @elseif($list->link_type == 2)
                                                <th scope="row">{{ __('main.blank') }}</th>
                                            @endif
                                            <td>{{ $list->creator->username }}</td>
                                            <td>{{ $list->updator->username ?? '---' }}</td>
                                            <td>{{ $list->created_at->format('d.m.Y | H:m:i') }}</td>
                                            <td>{{ $list->updated_at->format('d.m.Y | H:m:i') }}</td>
                                            <td>
                                                <form action="{{ route('links.destroy', $list->id) }}"
                                                      method="POST">
                                                    <a href="{{ route('links.show', $list->id) }}"
                                                       class="btn btn-success btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('links.edit', $list->id) }}"
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
                                {{$lists->links('admin.components.pagination')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
