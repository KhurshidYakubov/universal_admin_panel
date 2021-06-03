@extends('layouts.user')
@section('content')
    @include('user.components.top_menu')
    <section id="page-header" data-parallax="scroll" data-image-src="img/header-bg-min.png" class="d-flex flex-column">
        @include('user.components.navbar')
        <div class="container d-flex align-items-center flex-fill">
            <div class="page-data">
                <h1 class="page-title">Vacancies</h1>
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
            <div class="files-block clearfix py-5">
                <div class="row">
                    <div class="col-md-6 col-12">
                        @foreach($files as $file)
                            <div class="list-group list-group-flush">
                                <a href="{{ $file->anons_image }}"
                                   class="list-group-item"><i
                                        class="fas fa-file-download"></i>{{ $file->translate(app()->getLocale())->title ?? '' }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{$files->links('user.components.pagination')}}
@endsection
