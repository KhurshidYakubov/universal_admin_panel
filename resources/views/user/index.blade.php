@extends('layouts.user')
@section('content')
    @include('user.components.top_menu')
    <section id="header" data-parallax="scroll" data-image-src="img/header-bg-min.png" class="d-flex flex-column">
        <div class="container d-flex justify-content-center align-items-center flex-fill">
            @include('user.components.navbar')
            <div class="hero text-center justify-content-center">
                <h1 class="text-white font-weight-bold">ABOUT US</h1>
                <p class="mt-3">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum. Stet.
                </p>
            </div>
        </div>
    </section>
    <section id="posts">
        <div class="container">
            <div class="row post-card-box">
                @foreach($news as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 post-card-item">
                        <a href="#" class="card shadow-sm">
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
            <div class="text-center text-sm-center text-md-right text-lg-right mt-1">
                <a href="#" class="btn btn-link text-dark font-weight-bold text-decoration-none">Все новости</a>
            </div>
        </div>
    </section>
    <section id="team">
        <div class="container">
            <h1 class="text-center">
                Meet <span class="text-green">Our Team</span>
            </h1>
            <div class="row team-card-box justify-content-center">
                @foreach($team_members as $member)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 team-card-item bg-xs-white">
                        <div class="team-card">
                            <div class="team-card-image"
                                 style="background-image:url('{{ $member->leader_image }}');"></div>
                            <div class="bg-xs-white-inner">
                                <div class="team-card-data">
                                    <div class="team-card-data-name">
                                        {{ $member->translate(app()->getLocale())->title }}
                                    </div>
                                    <div class="team-card-data-position">
                                        {{ $member->translate(app()->getLocale())->leader }}
                                    </div>
                                    <div class="team-card-data-social d-flex justify-content-center">
                                        <a class="btn-social" href="{{ $member->phone }}" target="_blank">
                                            <i class="fab fa-telegram-plane"></i>
                                        </a>
                                        <a class="btn-social" href="{{ $member->email }}" target="_blank">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                        <a class="btn-social" href="{{ $member->fax }}" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="statistics">
        <div class="container">
            <h1 class="text-center mb-5">
                Statistics
            </h1>
            <div class="row stat-card-box">
                @foreach($statistics as $item)
                    <div class="col-md-3 col-sm-6 col-12 stat-card-item mb-5 mb-sm-2 mb-5">
                        <div class="stat-card">
                            <div class="stat-card-img text-center">
                                <img src='{{ $item->anons_image }}' alt="">
                            </div>
                            <div class="stat-card-number">
                                {{ $item->short_description }}
                            </div>
                            <div class="stat-card-text">
                                {{ $item->translate(app()->getLocale())->title ?? '' }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="partners">
        <div class="container">
            <ul id="partners-slider" class="owl-carousel">
                @foreach($links as $item)
                    <li class="item">
                        <a href="{{ $item->link }}" class="partners-slider-box"
                           target="{{ $item->link_type == 1 ? '_self' : '_blank' }}">
                            <img src="{{ $item->anons_image }}" alt=""/>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
