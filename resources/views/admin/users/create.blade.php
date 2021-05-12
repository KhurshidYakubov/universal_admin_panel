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

                            <form action="{{ route('users.store') }}" method="POST"
                                  enctype="multipart/form-data" autocomplete="off">
                                @method('POST')
                                @csrf
                                <div class="row">

                                    <?= CreateInputs::getColSix('username', 'Username'); ?>
                                    <?= CreateInputs::getColSix('email', __('main.email')); ?>
                                    <?= CreateInputs::getColSix('first_name', __('main.name')); ?>
                                    <?= CreateInputs::getColSix('last_name', __('main.surname')); ?>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>{{ __('main.role') }}</strong>
                                            <select class="form-control" name="role">
                                                <option value="guest">{{ __('main.user') }}</option>
                                                <option value="admin">{{ __('main.admin') }}</option>
                                                <option value="superadmin">{{ __('main.super_admin') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>{{ __('main.status') }}</strong>
                                            <select class="form-control" name="status">
                                                <option value="0">{{ __('main.inactive') }}</option>
                                                <option value="1">{{ __('main.active') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <?= CreateInputs::getColFour('password', __('main.new_password')); ?>

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
