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
                            <h1 class="h3 mb-0 text-gray-800">{{ __('main.pages') }}</h1>
                            <a href="{{route('pages.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i> {{ __('main.add') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <form action="{{ route('news.index') }}" method="GET" id='myform'>
                                        @csrf
                                        <tr>
                                            <th scope="col">{{ __('main.id') }}</th>
                                            <th scope="col">{{ __('main.title') }}</th>
                                            <th scope="col">{{ __('main.status') }}</th>
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
                                            <th>
                                                <input type="text" class="form-control" name="title_filter">
                                            </th>
                                            <th>
                                                <select name="status_filter" class="form-control"
                                                        onchange='submitForm();'>
                                                    <option value="">---</option>
                                                    <option value="0">{{ __('main.inactive') }}</option>
                                                    <option value="1">{{ __('main.active') }}</option>
                                                </select>
                                            </th>
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
                                            <td>{{ $list->translate(app()->getLocale())->title ?? ''}}</td>
                                            @if($list->status == 0)
                                                <td>{{ __('main.inactive') }}</td>
                                            @elseif($list->status == 1)
                                                <td>{{ __('main.active') }}</td>
                                            @endif
                                            <td>{{ $list->creator->username }}</td>
                                            <td>{{ $list->updator->username ?? '---' }}</td>
                                            <td>{{ $list->created_at->format('d.m.Y | H:m:i') }}</td>
                                            <td>{{ $list->updated_at->format('d.m.Y | H:m:i') }}</td>
                                            <td>
                                                <form action="{{ route('pages.destroy', $list->id) }}"
                                                      method="POST">
                                                    <a href="{{ route('pages.show', $list->id) }}"
                                                       class="btn btn-success btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('pages.edit', $list->id) }}"
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
