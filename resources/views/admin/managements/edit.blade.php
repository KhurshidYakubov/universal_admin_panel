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

                            <form action="{{ route('managements.update', $management->id) }}" method="POST"
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
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>{{ __('main.categories') }}</strong>
                                                <select class="form-control" name="category_id">
                                                    @foreach($management_categories as $management_category)
                                                        <option value="{{ $management_category->id }}" {{ $management->category_id == $management_category->id ? 'selected' : '' }}>{{ $management_category->translate(app()->getLocale())->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="oz" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        <div class="form-group">
                                            <label class="required" for="oz_title">{{ __('main.fio') }} | O'z</label>
                                            <input
                                                class="form-control {{ $errors->has('oz_title') ? 'is-invalid' : '' }}"
                                                type="text" name="oz_title" id="oz_title"
                                                value="{{ $management->translate('oz')->title ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="required" for="oz_leader">{{ __('main.position') }} |
                                                O'z</label>
                                            <input
                                                class="form-control {{ $errors->has('oz_leader') ? 'is-invalid' : '' }}"
                                                type="text" name="oz_leader" id="oz_leader"
                                                value="{{ $management->translate('oz')->leader ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="form-group">
                                            <label for="ru_title">{{ __('main.fio') }} | Ру</label>
                                            <input
                                                class="form-control {{ $errors->has('ru_title') ? 'is-invalid' : '' }}"
                                                type="text" name="ru_title" id="ru_title"
                                                value="{{ $management->translate('ru')->title ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="ru_leader">{{ __('main.position') }} | Ру</label>
                                            <input
                                                class="form-control {{ $errors->has('ru_leader') ? 'is-invalid' : '' }}"
                                                type="text" name="ru_leader" id="ru_leader"
                                                value="{{ $management->translate('ru')->leader ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="form-group">
                                            <label for="en_title">{{ __('main.fio') }} | En</label>
                                            <input
                                                class="form-control {{ $errors->has('en_title') ? 'is-invalid' : '' }}"
                                                type="text" name="en_title" id="en_title"
                                                value="{{ $management->translate('en')->title ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="uz_title">{{ __('main.position') }} | En</label>
                                            <input
                                                class="form-control {{ $errors->has('en_leader') ? 'is-invalid' : '' }}"
                                                type="text" name="en_leader" id="en_leader"
                                                value="{{ $management->translate('en')->leader ?? ''  }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong class="d-block">{{ __('main.image') }}</strong>
                                            <input id="thumbnail" class="form-control col-sm-11 d-inline" type="text"
                                                   name="filepath" value="{{ $management->leader_image }}">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder">
                                                {{ __('main.choose') }}
                                            </a>
                                            <img src='{{ $management->leader_image  }}' alt=""
                                                 style="width: 100px; margin-top: 5px;">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ __('main.telegram_link') }}</strong>
                                            <input type="text" name="telegram" class="form-control"
                                                   value="{{ $management->phone }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ __('main.linkedin_link') }}</strong>
                                            <input type="text" name="linkedin" class="form-control"
                                                   value="{{ $management->email }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ __('main.facebook_link') }}</strong>
                                            <input type="text" name="facebook" class="form-control"
                                                   value="{{ $management->fax }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
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
