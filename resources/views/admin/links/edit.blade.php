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

                            <form action="{{ route('links.update', $list->id) }}" method="POST"
                                  enctype="multipart/form-data" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ __('main.categories') }}</strong>
                                            <select class="form-control" name="category_id">
                                                <option value="">---</option>
                                                @foreach($list_categories as $list_category)
                                                    <option
                                                        value="{{ $list_category->id }}">{{ $list_category->translate(app()->getLocale())->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ __('main.link') }}</strong>
                                            <input type="text" name="link" class="form-control"
                                                   value="{{ $list->link }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong class="d-block">{{ __('main.image') }}</strong>
                                            <input id="thumbnail" class="form-control col-sm-11 d-inline" type="text"
                                                   name="filepath" value="{{ $list->anons_image }}">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder">
                                                {{ __('main.choose') }}
                                            </a>
                                            <img src='{{ $list->anons_image  }}' alt=""
                                                 style="width: 100px; margin-top: 5px;">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ __('main.link_type') }}</strong>
                                            <select class="form-control" name="link_type">
                                                <option value="1">{{ __('main.self') }}</option>
                                                <option value="2">{{ __('main.blank') }}</option>
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
