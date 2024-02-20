@extends('layouts.pages')

@section('content')
    <div class="container">
        <h1 class="display-4">@lang('Sustainability')</h1>
        <p class="lead">
            @lang('sustainability.intro')
        </p>

        <img src="{{ asset('images/sustainability/image.jpg')  }}" class="img-fluid mb-3" alt="@lang('Sustainability') photo">

        <p class="lead">
            @lang('sustainability.outro')
        </p>
    </div>
@endsection
