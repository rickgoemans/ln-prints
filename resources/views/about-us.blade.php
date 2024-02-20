@extends('layouts.pages')

@section('content')
    <div class="container">
        <h1 class="display-4">@lang('About us')</h1>
        <p class="lead">
            @lang('about-us.intro')
        </p>

        <img src="{{ asset('images/about-us/photo.jpg')  }}" class="img-fluid" alt="@lang('About us') photo">
    </div>
@endsection
