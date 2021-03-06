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
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.team') }} #{{ $management->id }}</h1>
                        <form action="{{ route('managements.destroy', $management->id) }}" method="POST">
                            <a href="{{route('managements.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i></a>
                            <a href="{{ route('managements.index') }}"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-list"></i>
                            </a>
                            <a href="{{ route('managements.edit', $management->id) }}"
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
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ru" role="tab"
                               aria-controls="contact" aria-selected="false">????</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#en" role="tab"
                               aria-controls="profile" aria-selected="false">EN</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="oz" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.fio') }}:</td>
                                    <th scope="row">{{ $management->translate('oz')->title ?? '---' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.position') }}:</td>
                                    <th scope="row">{{ $management->translate('oz')->leader ?? '---' }}</th>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.fio') }}:</td>
                                    <th scope="row">{{ $management->translate('ru')->title ?? '---' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.position') }}:</td>
                                    <th scope="row">{{ $management->translate('ru')->leader ?? '---' }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.fio') }}:</td>
                                    <th scope="row">{{ $management->translate('en')->title ?? '---' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.position') }}:</td>
                                    <th scope="row">{{ $management->translate('en')->leader ?? '---' }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>{{ __('main.id') }}:</td>
                            <th scope="row">{{ $management->id}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.categories') }}:</td>
                            <th scope="row">{{ $management->managementCat->title ?? '---' }}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.image') }}:</td>
                            <th scope="row">
                                @if(isset($management->leader_image))
                                    <img src='{{ $management->leader_image }}' alt="" style="width: 100px;">
                                @else
                                    ---
                                @endif
                            </th>
                        </tr>

                        <tr>
                            <td>{{ __('main.telegram_link') }}:</td>
                            <th scope="row">{{ $management->phone }}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.linkedin_link') }}:</td>
                            <th scope="row">{{ $management->email }}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.facebook_link') }}:</td>
                            <th scope="row">{{ $management->fax }}</th>
                        </tr>

                        <tr>
                            <td>{{ __('main.status') }}:</td>
                            @if($management->status == 0)
                                <th scope="row">{{ __('main.inactive') ?? '---' }}</th>
                            @elseif($management->status == 1)
                                <th scope="row">{{ __('main.active') ?? '---'}}</th>
                            @endif
                        </tr>

                        <tr>
                            <td>{{ __('main.creator') }}:</td>
                            <th scope="row">{{ $management->creator->username }}</th>
                        </tr>

                        <tr>
                            <td>{{ __('main.modifier') }}:</td>
                            <th scope="row">{{ $management->updater->username ?? '---'}}</th>
                        </tr>

                        <tr>
                            <td>{{ __('main.created_at') }}:</td>
                            <th scope="row">{{ $management->created_at->format('d.m.Y | H:m:i') }}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.updated_at') }}:</td>
                            <th scope="row">{{ $management->updated_at->format('d.m.Y | H:m:i') }}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
@endsection
