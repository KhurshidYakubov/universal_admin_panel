@extends('layouts.user')
@section('content')
    @include('user.components.top_menu')
    <section id="page-header" data-parallax="scroll" data-image-src="img/header-bg-min.png" class="d-flex flex-column">
        @include('user.components.navbar')
        <div class="container d-flex align-items-center flex-fill">
            <div class="page-data">
                <h1 class="page-title">{{ __('main.programs') }}</h1>
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
    <section id="program-list">
        <div class="container">
            <div class="row program-card-box">
                @foreach($programs as $item)
                    <?php
                    if(isset($item->leaders)){
                    $leader_id = json_decode($item->leaders);
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 program-card-item">
                        <div class="card">
                            <div class="card-header text-center">
                                <div class="card-header-image"
                                     style="background-image:url('{{ $item->anons_image }}');"></div>
                                <div class="card-caption">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        {{ $item->translate(app()->getLocale())->title }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    {{ __('main.leaders') }}:
                                    @for($i = 0; $i < count($leader_id); $i++)
                                        @foreach ($leaders as $leader)
                                            @if($leader_id[$i] == $leader->id)
                                                {{ $leader->translate(app()->getLocale() ?? '')->title }},
                                            @endif
                                        @endforeach
                                    @endfor
                                </div>
                                <div class="card-short">
                                    {!!   Str::limit($item->translate(app()->getLocale())->body, 145) !!}
                                </div>
                                <div class="card-btn">
                                    <button type="button" class="btn btn-more">
                                        <a href='{{ route('programs-item', $item->id) }}'
                                           style="text-decoration: none; color: #000;">
                                            {{ __('main.more') }}
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                @endforeach
            </div>
        </div>
    </section>
    {{$programs->links('user.components.pagination')}}
@endsection
