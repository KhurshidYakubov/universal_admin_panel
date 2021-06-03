@extends('layouts.user')
@section('content')
    @include('user.components.top_menu')
    <section id="page-header" data-parallax="scroll" data-image-src="img/header-bg-min.png" class="d-flex flex-column">
        @include('user.components.navbar')
        <div class="container d-flex align-items-center flex-fill">
            <div class="page-data">
                <h1 class="page-title">{{ __('main.vacancies') }}</h1>
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
            <div class="vacancy-block clearfix py-5">
                <div class="vacancy-content mb-4">
                    <h1>{{ $vacancy->translate(app()->getLocale())->title ?? '' }}</h1>
                    {!!  $vacancy->translate(app()->getLocale())->body ?? ''!!}
                </div>
                <div class="vacancy-apply-btn">
                    <button type="button" class="btn btn-green">
                        Apply now
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
