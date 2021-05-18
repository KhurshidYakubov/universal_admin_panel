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
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.menu_categories') }} #{{ $menu_category->id }}</h1>
                        <form action="{{ route('menu_categories.destroy', $menu_category->id) }}" method="POST">
                            <a href="{{route('menu_categories.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i></a>
                            <a href="{{ route('menu_categories.index') }}"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-list"></i>
                            </a>
                            <a href="{{ route('menu_categories.edit', $menu_category->id) }}"
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
                                    <td>{{ __('main.title') }}:</td>
                                    <th scope="row">{{ $menu_category->translate('oz')->title ?? '---' }}</th>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.title') }}:</td>
                                    <th scope="row">{{ $menu_category->translate('uz')->title ?? '---' }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.title') }}:</td>
                                    <th scope="row">{{ $menu_category->translate('ru')->title ?? '---' }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>{{ __('main.id') }}:</td>
                            <th scope="row">{{ $menu_category->id}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.status') }}:</td>
                            @if($menu_category->status == 0)
                                <th scope="row">{{ __('main.inactive') ?? '---' }}</th>
                            @elseif($menu_category->status == 1)
                                <th scope="row">{{ __('main.active') ?? '---'}}</th>
                            @endif
                        </tr>
                        </tbody>
                    </table>
                </div>
@endsection
