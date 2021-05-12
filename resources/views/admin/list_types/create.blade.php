<?php

use App\Helpers\CreateInputs;

?>
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
                                <h1 class="h3 mb-0 text-gray-800">{{ __('main.create') }}</h1>
                            </div>

                            <form action="{{ route('list_types.store') }}" method="POST"
                                  enctype="multipart/form-data" autocomplete="off">
                                @method('POST')
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
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="oz" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        <div class="form-group">
                                            <label class="required" for="oz_title">{{ __('main.title') }} | O'z</label>
                                            <input
                                                class="form-control {{ $errors->has('oz_title') ? 'is-invalid' : '' }}"
                                                type="text" name="oz_title" id="oz_title"
                                                value="{{ old('oz_title', '') }}">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="form-group">
                                            <label for="uz_title">{{ __('main.title') }} | Уз</label>
                                            <input
                                                class="form-control {{ $errors->has('uz_title') ? 'is-invalid' : '' }}"
                                                type="text" name="uz_title" id="uz_title"
                                                value="{{ old('uz_title', '') }}">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="form-group">
                                            <label for="ru_title">{{ __('main.title') }} | Ру</label>
                                            <input
                                                class="form-control {{ $errors->has('ru_title') ? 'is-invalid' : '' }}"
                                                type="text" name="ru_title" id="ru_title"
                                                value="{{ old('ru_title', '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ __('main.status') }}</strong>
                                            <select class="form-control" name="status">
                                                <option value="0">{{ __('main.inactive') }}</option>
                                                <option value="1">{{ __('main.active') }}</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                                        <button type="submit" class="btn btn-primary">{{ __('main.save') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
