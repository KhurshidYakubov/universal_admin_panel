@extends('layouts.user')
@section('content')
    <h2>Landing Page</h2>
    <h5>{{ __('main.locale_test') }}</h5>

    <a href="{{ 'admin' }}">Admin panelga kirish</a>
@endsection
