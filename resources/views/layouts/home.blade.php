@extends('layouts.app')
@section('style')
    <link href="{{ mix('css/home.css') }}" rel="stylesheet">
@endsection
@section('body')
    <body class="h-100">
    @include('partials.google-tag-no-script')
    @yield('content')
@endsection
