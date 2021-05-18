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
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.menu') }} {{ $menu->id }}</h1>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                            <a href="{{route('menus.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i></a>
                            <a href="{{ route('menus.index') }}"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-list"></i>
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
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px;">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oz" role="tab"
                               aria-controls="home" aria-selected="true">O'Z</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#uz" role="tab"
                               aria-controls="profile" aria-selected="false">ЎЗ</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ru" role="tab"
                               aria-controls="contact" aria-selected="false">РУ</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="oz" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.name') }}:</td>
                                    <th scope="row">{{ $menu->translate('oz')->title ?? '' }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.name') }}:</td>
                                    <th scope="row">{{ $menu->translate('uz')->title ?? '' }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.name') }}:</td>
                                    <th scope="row">{{ $menu->translate('ru')->title ?? '' }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>{{ __('main.main_menu') }}:</td>
                            <th scope="row">{{ $menu->submenus->title ?? '---'}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.categories') }}:</td>
                            <th scope="row">{{ $menu->menuCategory->title ?? '---'}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.link') }}:</td>
                            <th scope="row">{{ $menu->link ?? '---'}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.link_type') }}:</td>
                            <th scope="row">{{ $menu->link_type ?? '---'}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.image') }}:</td>
                            <th scope="row">
                                @if(isset($menu->image))
                                    <img src='{{ $menu->image }}' alt="" style="width: 100px;">
                                @else
                                    ---
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <td>{{ __('main.order') }}:</td>
                            <th scope="row">{{ $menu->order ?? '---'}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.status') }}:</td>
                            @if($menu->status == 0)
                                <th scope="row">{{ __('main.inactive') ?? '---' }}</th>
                            @elseif($menu->status == 1)
                                <th scope="row">{{ __('main.active') ?? '---'}}</th>
                            @endif
                        </tr>
                        <tr>
                            <td>{{ __('main.creator') }}:</td>
                            <th scope="row">{{ $menu->creator->username }}</th>
                        </tr>

                        <tr>
                            <td>{{ __('main.modifier') }}:</td>
                            <th scope="row">{{ $menu->updater->username ?? '---'}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.created_at') }}:</td>
                            <th scope="row">{{ $menu->created_at->format('d.m.Y | H:m:i') }}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.updated_at') }}:</td>
                            <th scope="row">{{ $menu->updated_at->format('d.m.Y | H:m:i') }}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
