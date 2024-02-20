@extends('layouts.pages')

@section('content')
    <div class="container">
        <h1 class="display-4">@lang('Process')</h1>
        <p class="lead">@lang('process.intro')</p>
        <img src="{{ asset('images/process/image.jpg')  }}" class="img-fluid" alt="@lang('Process') photo">
    </div>
@endsection
