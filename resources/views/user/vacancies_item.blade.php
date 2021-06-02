@extends('layouts.user')
@section('content')
    @include('user.components.top_menu')
    <section id="page-header" data-parallax="scroll" data-image-src="img/header-bg-min.png" class="d-flex flex-column">
        @include('user.components.navbar')
        <div class="container d-flex align-items-center flex-fill">
            <div class="page-data">
                <h1 class="page-title">Bachelor</h1>
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
                    <h1>Teacher</h1>
                    <p>
                        Fashion Design is one of 12 major directions that was opened in 2019-2020 academic year at Yeoju
                        Technical Institute.
                        At Fashion Design direction, students get the opportunity to undergo in-depth training and gain
                        extensive knowledge in the following composite areas:
                    </p>
                    <ul>
                        <li>design program (development of clothing design);</li>
                        <li>drawing / painting;</li>
                        <li>fashion history (study of social and cultural sources);</li>
                        <li>work with material, texture, shape;</li>
                        <li>Modern graphic programs (work with innovative computer technologies);</li>
                        <li>sewing technique;</li>
                        <li>styling and subject photography.</li>
                    </ul>
                    <p>
                        The main subjects allow students of “Fashion Design” to master not only deep theoretical
                        knowledge, but
                        also
                        receive and develop practical skills in the chosen profession. Having mastered a wide range of
                        tools in
                        subjects that exceeds the standard set of disciplines in most universities, the students of our
                        institute
                        from the first course get a real opportunity to do the personal shows at professional fashion
                        weeks,
                        participate in national and international competitions, collaborate with fashion brands
                        (patented
                        logos),
                        and have internships in film and theater productions.
                        As part of their projects, students work on topical industry issues, develop their creative
                        thinking and
                        learn how to solve problems, like future creative directors and designers of brands that set the
                        tone in
                        fashion.
                    </p>
                    <h1>Requirements</h1>
                    <ul>
                        <li>design program (development of clothing design);</li>
                        <li>drawing / painting;</li>
                        <li>fashion history (study of social and cultural sources);</li>
                        <li>work with material, texture, shape;</li>
                        <li>Modern graphic programs (work with innovative computer technologies);</li>
                        <li>sewing technique;</li>
                        <li>styling and subject photography.</li>
                    </ul>
                    <h1>Sallary</h1>
                    <ul>
                        <li>design program (development of clothing design);</li>
                        <li>drawing / painting;</li>
                        <li>fashion history (study of social and cultural sources);</li>
                        <li>work with material, texture, shape;</li>
                        <li>Modern graphic programs (work with innovative computer technologies);</li>
                        <li>sewing technique;</li>
                        <li>styling and subject photography.</li>
                    </ul>
                    <h1>Contacts</h1>
                    <p>
                        Fashion Design is one of 12 major directions that was opened in 2019-2020 academic year at Yeoju
                        Technical Institute.
                        At Fashion Design direction, students get the opportunity to undergo in-depth training and gain
                        extensive knowledge in the following composite areas:
                    </p>
                    <ul>
                        <li>design program (development of clothing design);</li>
                        <li>drawing / painting;</li>
                        <li>fashion history (study of social and cultural sources);</li>
                        <li>work with material, texture, shape;</li>
                        <li>Modern graphic programs (work with innovative computer technologies);</li>
                        <li>sewing technique;</li>
                        <li>styling and subject photography.</li>
                    </ul>
                    <p>
                        The main subjects allow students of “Fashion Design” to master not only deep theoretical
                        knowledge, but
                        also
                        receive and develop practical skills in the chosen profession. Having mastered a wide range of
                        tools in
                        subjects that exceeds the standard set of disciplines in most universities, the students of our
                        institute
                        from the first course get a real opportunity to do the personal shows at professional fashion
                        weeks,
                        participate in national and international competitions, collaborate with fashion brands
                        (patented
                        logos),
                        and have internships in film and theater productions.
                        As part of their projects, students work on topical industry issues, develop their creative
                        thinking and
                        learn how to solve problems, like future creative directors and designers of brands that set the
                        tone in
                        fashion.
                    </p>
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
