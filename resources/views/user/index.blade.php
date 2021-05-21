@extends('layouts.user')
@section('content')
    @include('user.components.navbar')
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
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 team-card-item bg-xs-white">
                    <div class="team-card">
                        <div class="team-card-image" style="background-image:url('img/team/member1.png');"></div>
                        <div class="bg-xs-white-inner">
                            <div class="team-card-data">
                                <div class="team-card-data-name">
                                    Prof. Janpolat Kudaybergenov
                                </div>
                                <div class="team-card-data-position">
                                    Vice-Rector for Academi…
                                </div>
                                <div class="team-card-data-social d-flex justify-content-center">
                                    <a class="btn-social">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 team-card-item bg-xs-white">
                    <div class="team-card">
                        <div class="team-card-image" style="background-image:url('img/team/member1.png');"></div>
                        <div class="bg-xs-white-inner">
                            <div class="team-card-data">
                                <div class="team-card-data-name">
                                    Prof. Janpolat Kudaybergenov
                                </div>
                                <div class="team-card-data-position">
                                    Vice-Rector for Academi…
                                </div>
                                <div class="team-card-data-social d-flex justify-content-center">
                                    <a class="btn-social">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 team-card-item bg-xs-white">
                    <div class="team-card">
                        <div class="team-card-image" style="background-image:url('img/team/member1.png');"></div>
                        <div class="bg-xs-white-inner">
                            <div class="team-card-data">
                                <div class="team-card-data-name">
                                    Prof. Janpolat Kudaybergenov
                                </div>
                                <div class="team-card-data-position">
                                    Vice-Rector for Academi…
                                </div>
                                <div class="team-card-data-social d-flex justify-content-center">
                                    <a class="btn-social">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 team-card-item bg-xs-white">
                    <div class="team-card">
                        <div class="team-card-image" style="background-image:url('img/team/member1.png');"></div>
                        <div class="bg-xs-white-inner">
                            <div class="team-card-data">
                                <div class="team-card-data-name">
                                    Prof. Janpolat Kudaybergenov
                                </div>
                                <div class="team-card-data-position">
                                    Vice-Rector for Academi…
                                </div>
                                <div class="team-card-data-social d-flex justify-content-center">
                                    <a class="btn-social">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="btn-social">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <li class="item">
                    <a href="#" class="partners-slider-box">
                        <img src="img/partners/gov.uz.png" alt=""/>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="partners-slider-box">
                        <img src="img/partners/edu.uz.png" alt=""/>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="partners-slider-box">
                        <img src="img/partners/uzedu.uz.png" alt=""/>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="partners-slider-box">
                        <img src="img/partners/lex.uz.png" alt=""/>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="partners-slider-box">
                        <img src="img/partners/data.gov.uz.png" alt=""/>
                    </a>
                </li>
            </ul>
        </div>
    </section>
@endsection
