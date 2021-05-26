@extends('layouts.user')
@section('content')
    @include('user.components.top_menu')
    <section id="page-header" data-parallax="scroll" data-image-src="img/header-bg-min.png" class="d-flex flex-column">
        @include('user.components.navbar')
        <div class="container d-flex align-items-center flex-fill">
            <div class="page-data">
                <h1 class="page-title">Our team</h1>
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
    <main class="pb-5">
        <section id="team" class="bg-white">
            <div class="container">
                <h1 class="text-center my-4">
                    <span class="text-green">Our Team</span>
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
    </main>
    {{$team_members->links('user.components.pagination')}}
@endsection
