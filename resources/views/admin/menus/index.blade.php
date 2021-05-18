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
                            <h6 class="m-0 font-weight-bold text-primary">{{ __('main.menu') }}</h6>
                            <a href="{{route('menus.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i> {{ __('main.add') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <form action="{{ route('menus.index') }}" method="GET" id='myform'>
                                        @csrf
                                        <tr>
                                            <th>{{ __('main.id') }}</th>
                                            <th>{{ __('main.main_menu') }}</th>
                                            <th>{{ __('main.name') }}</th>
                                            <th>{{ __('main.manage') }}</th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type="number" class="form-control" name="id_filter"
                                                       style="width: 70px; margin: 0 auto;">
                                            </th>
                                            <th>
                                                <select name="type_filter" class="form-control"
                                                        onchange='submitForm();'>
                                                    <option value="">--</option>
                                                    @foreach ( $main_menu as $item)
                                                        <option
                                                            value="{{ $item->id }}"> {{ $item->translate(app()->getLocale())->name }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control" name="name_filter">
                                            </th>
                                            <th></th>
                                        </tr>
                                        <button type="submit" hidden></button>
                                    </form>

                                    </thead>
                                    <tbody>
                                    @foreach($menus as $menu)
                                        <tr>
                                            <th scope="row">{{ $menu->id }}</th>
                                            @if($menu->parent_id === null)
                                                <td><b>{{ __('main.main_menu') }}</b></td>
                                            @else
                                                <td>{{ $menu->submenus->translate(app()->getLocale())->title }}</td>
                                            @endif
                                            <td>{{ $menu->translate(app()->getLocale())->title }}</td>
                                            <td>
                                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                                    <a href="{{ route('menus.show', $menu->id) }}"
                                                       class="btn btn-success btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('menus.edit', $menu->id) }}"
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
                                {{$menus->links('admin.components.pagination')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
