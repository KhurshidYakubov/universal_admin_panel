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
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.programs') }} #{{ $list->id }}</h1>
                        <form action="{{ route('programs.destroy', $list->id) }}" method="POST">
                            <a href="{{route('programs.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i></a>
                            <a href="{{ route('programs.index') }}"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-list"></i>
                            </a>
                            <a href="{{ route('programs.edit', $list->id) }}"
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
                               aria-controls="contact" aria-selected="false">РУ</a>
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
                                    <td>{{ __('main.title') }}:</td>
                                    <th scope="row">{{ $list->translate('oz')->title ?? '---' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.main_content') }}:</td>
                                    <th scope="row">{!!   $list->translate('oz')->body ?? '---' !!}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.title') }}:</td>
                                    <th scope="row">{{ $list->translate('ru')->title ?? '---' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.main_content') }}:</td>
                                    <th scope="row">{!!   $list->translate('ru')->body ?? '---' !!}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.title') }}:</td>
                                    <th scope="row">{{ $list->translate('en')->title ?? '---' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.main_content') }}:</td>
                                    <th scope="row">{!!   $list->translate('en')->body ?? '---' !!}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>{{ __('main.id') }}:</td>
                            <th scope="row">{{ $list->id}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.types') }}:</td>
                            @if(isset($list->category_id))
                                <th scope="row">{{ $list->listCat->translate(app()->getLocale())->title}}</th>
                            @else
                                <th scope="row">---</th>
                            @endif
                        </tr>
                        <tr>
                            <td>{{ __('main.status') }}:</td>
                            @if($list->status == 0)
                                <th scope="row">{{ __('main.inactive') ?? '---' }}</th>
                            @elseif($list->status == 1)
                                <th scope="row">{{ __('main.active') ?? '---'}}</th>
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
                            <td>{{ __('main.leaders') }}:</td>
                            <th scope="row">
                                @if(isset($leader_id))
                                    @for($i = 0; $i<count($leader_id); $i++)
                                        @foreach ($leaders as $leader)
                                            @if($leader_id[$i] == $leader->id)
                                                {{ $leader->translate(app()->getLocale() ?? '')->title }} |
                                            @endif
                                        @endforeach
                                    @endfor
                                @else
                                    ---
                                @endif
                            </th>
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
                            <td>Slug:</td>
                            <th scope="row">{{ $list->slug }}</th>
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
