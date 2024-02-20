@extends('layouts.app')
@section('style')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
@endsection
@section('body')
    <body class="h-100 d-flex flex-column">
    @include('partials.google-tag-no-script')
    <div class="page-content">
        @include('partials.header')

        @include('flash::message')

        <main role="main">
            @yield('content')
        </main>
    </div>

    @include('partials.footer')
    @include('partials.scripts')
@endsection
