<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#000000">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="theme-color" content="#ffffff">
    {{-- /Favicon --}}

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- /Fonts --}}

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    <style>
        .bg-black {
            background-color: #000;
        }

        h1 {
            font-family: 'Hiragino', Arial, sans-serif;
        }
    </style>
    {{-- /Styles --}}

    @if(app()->environment() == 'production')
        {{-- Google site tag - Google Analytics --}}
        {{-- /Google site tag - Google Analytics --}}
    @endif
</head>
<body>
<div class="d-flex align-items-center justify-content-center bg-black vh-100">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('images/logo.jpg') }}" alt="{{config('app.name')}} logo" class="img-fluid">
            </div>
            <div class="col-12 text-center">
                <h1 class="text-white fa-2x">@lang('Coming soon')&hellip;</h1>
            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
{{-- /Scripts --}}
</body>
</html>
