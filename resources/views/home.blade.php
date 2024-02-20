@extends('layouts.home')
@section('content')
    <div class="container-fluid h-100">
        <div class="row flex-row-reverse">
            <div class="col col-12 col-lg-6 h-100">
                <div class="row h-100">
                    <div class="col col-12 col-lg-6 h-100">
                        <div class="h-100 w-100 bg-black d-flex align-items-center">
                            <img src="{{ asset('images/logo.jpg') }}" alt="{{ config('app.name') }} logo" class="img-fluid">
                        </div>
                    </div>
                    <div class="col col-12 col-lg-6 h-100">
                        <div class="row h-100">
                            <a class="col col-12 h-50 img-hover-zoom vertical-block" href="{{ route('change-locale', [
                                'locale' => app()->getLocale() === 'nl' ? 'en' : 'nl',
                            ]) }}">
                                <div class="wrapper h-100 w-100">
                                    <img src="{{ asset('images/home/lang.jpg') }}" alt="Lang" class="h-100 w-100">
                                </div>
                                <div class="text-wrapper p-3">
                                    <h3 class="text-uppercase m-0">
                                        @if(app()->getLocale() === 'nl')
                                            English
                                        @else
                                            Nederlands
                                        @endif
                                    </h3>
                                </div>
                            </a>
                            <a class="col col-12 h-50 img-hover-zoom vertical-block" href="{{ route('contact.view') }}">
                                <div class="wrapper h-100 w-100">
                                    <img src="{{ asset('images/home/contact.jpeg') }}" alt="Contact" class="h-100 w-100">
                                </div>
                                <div class="text-wrapper p-3">
                                    <h3 class="text-uppercase m-0">
                                        @lang('Contact')
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="col col-12 col-lg-6 h-100 img-hover-zoom ml-auto" href="{{ route('fabrics') }}">
                <div class="wrapper h-100 w-100">
                    <img src="{{ asset('images/home/fabrics.jpg') }}" alt="Fabrics" class="h-100 w-100">
                </div>
                <div class="text-wrapper p-3">
                    <h3 class="text-uppercase m-0">
                        @lang('Fabrics')
                    </h3>
                </div>
            </a>
        </div>
        <div class="row">
            <a class="col col-12 col-lg-2 h-100 img-hover-zoom" href="{{ route('process') }}">
                <div class="wrapper h-100 w-100">
                    <img src="{{ asset('images/home/process.jpg') }}" alt="Process" class="h-100 w-100">
                </div>
                <div class="text-wrapper p-3">
                    <h3 class="text-uppercase m-0">
                        @lang('Process')
                    </h3>
                </div>
            </a>
            <a class="col col-12 col-lg-6 h-100 img-hover-zoom" href="{{ route('about-us') }}">
                <div class="wrapper h-100 w-100">
                    <img src="{{ asset('images/home/about_us.jpg') }}" alt="About us" class="h-100 w-100">
                </div>
                <div class="text-wrapper p-3">
                    <h3 class="text-uppercase m-0">
                        @lang('About us')
                    </h3>
                </div>
            </a>
            <a class="col col-12 col-lg-4 h-100 img-hover-zoom" href="{{ route('sustainability') }}">
                <div class="wrapper h-100 w-100">
                    <img src="{{ asset('images/home/sustainability.jpg') }}" alt="Sustainability" class="h-100 w-100">
                </div>
                <div class="text-wrapper p-3">
                    <h3 class="text-uppercase m-0">
                        @lang('Sustainability')
                    </h3>
                </div>
            </a>
        </div>
    </div>
@endsection
