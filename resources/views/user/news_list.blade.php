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
    <section id="posts-list">
        <div class="container">
            <div class="row post-card-box">
                @foreach($news as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 post-card-item">
                        <a href="{{ route('news-item', $item->id) }}" class="card shadow-sm">
                            <div class="card-header text-center">
                                <div class="card-header-image"
                                     style="background-image:url('{{ $item->anons_image }}');"></div>
                                <div class="card-date">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="card-date-day">{{ $item->created_at->format('d') }}</div>
                                        <div class="card-date-month">{{ $item->created_at->format('M') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div>{{ $item->translate(app()->getLocale())->title  ?? '' }}</div>
                                <span>
                            <i class="far fa-long-arrow-right"></i>
                        </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{$news->links('user.components.pagination')}}
        </div>
    </section>
@endsection
