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
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.links') }} #{{ $list->id }}</h1>
                        <form action="{{ route('links.destroy', $list->id) }}" method="POST">
                            <a href="{{route('links.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i></a>
                            <a href="{{ route('links.index') }}"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-list"></i>
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
                    </div>


                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>{{ __('main.id') }}:</td>
                            <th scope="row">{{ $list->id}}</th>
                        </tr>

                        <tr>
                            <td>{{ __('main.link') }}:</td>
                            <th scope="row">{{ $list->link}}</th>
                        </tr>

                        <tr>
                            <td>{{ __('main.link_type') }}:</td>
                            @if($list->link_type == 1)
                                <th scope="row">{{ __('main.self')}}</th
                            @elseif($list->link_type == 2)
                                <th scope="row">{{ __('main.blank')}}</th
                            @endif
                        </tr>

                        <tr>
                            <td>{{ __('main.image') }}:</td>
                            <th scope="row">
                                @if(isset($list->anons_image))
                                    <img src='{{ $list->anons_image }}' alt="" style="width: 100px;">
                                @else
                                    ---
                                @endif
                            </th>
                        </tr>

                        <tr>
                            <td>{{ __('main.categories') }}:</td>
                            @if(isset($list->category_id))
                                <th scope="row">{{ $list->listCat->translate(app()->getLocale())->title}}</th>
                            @else
                                <th scope="row">---</th>
                            @endif
                        </tr>
                        <tr>
                            <td>{{ __('main.creator') }}:</td>
                            <th scope="row">{{ $list->creator->username }}</th>
                        </tr>

                        <tr>
                            <td>{{ __('main.modifier') }}:</td>
                            <th scope="row">{{ $list->updater->username ?? '---'}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.created_at') }}:</td>
                            <th scope="row">{{ $list->created_at->format('d.m.Y | H:m:i') }}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.updated_at') }}:</td>
                            <th scope="row">{{ $list->updated_at->format('d.m.Y | H:m:i') }}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
@endsection
