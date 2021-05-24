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

                            <form action="{{ route('management_categories.update', $management_category->id) }}" method="POST"
                                  enctype="multipart/form-data" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px;">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oz" role="tab"
                                           aria-controls="home" aria-selected="true">O'Z</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ru" role="tab"
                                           aria-controls="contact" aria-selected="false">РУ</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#en" role="tab"
                                           aria-controls="profile" aria-selected="false">EN</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="oz" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        <div class="form-group">
                                            <label class="required" for="oz_title">{{ __('main.title') }} | O'z</label>
                                            <input
                                                class="form-control {{ $errors->has('oz_title') ? 'is-invalid' : '' }}"
                                                type="text" name="oz_title" id="oz_title"
                                                value="{{ $management_category->translate('oz')->title ?? '' }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="form-group">
                                            <label for="ru_title">{{ __('main.title') }} | Ру</label>
                                            <input
                                                class="form-control {{ $errors->has('ru_title') ? 'is-invalid' : '' }}"
                                                type="text" name="ru_title" id="ru_title"
                                                value="{{ $management_category->translate('ru')->title ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="form-group">
                                            <label for="en_title">{{ __('main.title') }} | En</label>
                                            <input
                                                class="form-control {{ $errors->has('en_title') ? 'is-invalid' : '' }}"
                                                type="text" name="en_title" id="en_title"
                                                value="{{ $management_category->translate('en')->title ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ __('main.status') }}</strong>
                                            <select class="form-control" name="status">
                                                <option value="1">{{ __('main.active') }}</option>
                                                <option value="0">{{ __('main.inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong class="d-block">{{ __('main.image') }}</strong>
                                            <input id="thumbnail" class="form-control col-sm-11 d-inline" type="text"
                                                   name="filepath" value="{{ $management_category->image }}">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder">
                                                {{ __('main.choose') }}
                                            </a>
                                            <img src='{{ $management_category->image  }}' alt="" style="width: 100px; margin-top: 5px;">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ __('main.color') }}</strong>
                                            <input type="text" name="color" class="form-control"
                                                   value="{{ $management_category->color }}">
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
