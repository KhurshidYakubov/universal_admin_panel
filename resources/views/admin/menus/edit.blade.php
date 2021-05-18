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
                        <div class="card-body">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">{{ __('main.update') }}</h1>
                            </div>

                            <form action="{{ route('menus.update', $menu->id) }}" method="POST"
                                  enctype="multipart/form-data" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px;">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oz" role="tab"
                                           aria-controls="home" aria-selected="true">O'Z</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#uz" role="tab"
                                           aria-controls="profile" aria-selected="false">УЗ</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ru" role="tab"
                                           aria-controls="contact" aria-selected="false">РУ</a>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>{{ __('main.main_menu') }}</strong>
                                            <select name="parent_id" class="form-control">
                                                <option value="">--{{ __('main.choose') }}--</option>
                                                @foreach ( $main_menu as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>{{ __('main.categories') }}</strong>
                                            <select name="category_id" class="form-control">
                                                <option value="">--{{ __('main.choose') }}--</option>
                                                @foreach ( $menu_categories as $menu_category)
                                                    <option
                                                        value="{{ $menu_category->id }}"> {{ $menu_category->translate(app()->getLocale())->title ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="oz" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        <div class="form-group">
                                            <label class="required" for="oz_title">{{ __('main.title') }} | O'z</label>
                                            <input
                                                class="form-control {{ $errors->has('oz_title') ? 'is-invalid' : '' }}"
                                                type="text" name="oz_title" id="oz_title"
                                                value="{{ $menu->translate('oz')->title ?? '' }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="form-group">
                                            <label for="uz_title">{{ __('main.title') }} | Уз</label>
                                            <input
                                                class="form-control {{ $errors->has('uz_title') ? 'is-invalid' : '' }}"
                                                type="text" name="uz_title" id="uz_title"
                                                value="{{ $menu->translate('uz')->title ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="form-group">
                                            <label for="ru_title">{{ __('main.title') }} | Ру</label>
                                            <input
                                                class="form-control {{ $errors->has('ru_title') ? 'is-invalid' : '' }}"
                                                type="text" name="ru_title" id="ru_title"
                                                value="{{ $menu->translate('ru')->title ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>{{ __('main.link') }}</strong>
                                            <input type="text" name="link" class="form-control"
                                                   value="{{ $menu->link }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>{{ __('main.link_type') }}</strong>
                                            <input type="text" name="link_type" class="form-control"
                                                   value="{{ $menu->link_type }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong class="d-block">{{ __('main.image') }}</strong>
                                            <input id="thumbnail" class="form-control col-sm-11 d-inline" type="text"
                                                   name="image" value="{{ $menu->image }}">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder">
                                                {{ __('main.choose') }}
                                            </a>
                                            <img src='{{ $menu->image  }}' alt="" style="width: 100px; margin-top: 5px;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>{{ __('main.order') }}</strong>
                                            <input type="text" name="order" class="form-control"
                                                   value="{{ $menu->order }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>{{ __('main.status') }}</strong>
                                            <select class="form-control" name="status">
                                                <option value="1">{{ __('main.active') }}</option>
                                                <option value="0">{{ __('main.inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>





                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                                        <button type="submit" class="btn btn-primary">{{ __('main.update') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
