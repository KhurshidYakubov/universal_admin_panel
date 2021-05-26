@extends('layouts.user')
@section('content')
    @include('user.components.top_menu')
    <section id="page-header" data-parallax="scroll" data-image-src="img/header-bg-min.png" class="d-flex flex-column">
        @include('user.components.navbar')
        <div class="container d-flex align-items-center flex-fill">
            <div class="page-data">
                <h1 class="page-title">News & Events</h1>
                <nav aria-label="breadcrumb" class="custom-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Library</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Data
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <main>
        <div class="container">
            <div class="post-item clearfix py-5">
                <div class="float-left col-lg-5 pl-0 post-image">
                    <img src="{{ $news_item->anons_image }}" class="w-100" alt="">
                    <div class="card-date">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="card-date-day">{{ $news_item->created_at->format('d') }}</div>
                            <div class="card-date-month">{{ $news_item->created_at->format('M') }}</div>
                        </div>
                    </div>
                </div>
                <div class="post-content text-justify">
                    <h1 class="text-uppercase ">{{ $news_item->translate(app()->getLocale())->title ?? '' }}</h1>
                    {!! $news_item->translate(app()->getLocale())->body ?? '' !!}
                </div>
            </div>
        </div>
    </main>
@endsection
