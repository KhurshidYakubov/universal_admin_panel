<!doctype html>
<html lang="en">
@include('admin.components.head')
<body class="login_body" style="background-image: url('{{ asset('images/admin/login_back.jpg') }}');">
<section class="content">
    <div class="container">
        <div class="one_id_login">
            <div class="one_id_login_inner shadow">
                <div class="one_id_in">
                    @if(Auth::check())
                        <a href="/admin/dashboard">
                            <img src="{{ asset('images/admin/oneid_logo.png') }}" alt="">
                        </a>
                    @else
                        <a href="{{ 'login' }}">
                            <img src="{{ asset('images/admin/oneid_logo.png') }}" alt="">
                        </a>
                    @endif
                </div>
                <div class="one_id_link">
                    @if(Auth::check())
                        <a href="/admin/dashboard">{{ $user->first_name }} {{ $user->last_name }}</a>
                    @else
                        <a href="{{ 'login' }}">OneID orqali kirish</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>


