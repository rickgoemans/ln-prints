@if(headerImage())
    <header style="background-image: url({{ headerImage() }}">
    </header>
@else
    <div style="min-height: 110px; width: 100%; content: ''"></div>
@endif
<nav class="navbar navbar-expand-sm fixed-top navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.jpg') }}" width="80" height="80" alt="{{ config('app.name') }} logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="navbar-nav">
                <li class="nav-item {{ Route::currentRouteName() == 'fabrics'  ? 'active' : '' }}">
                    <a class="nav-link text-white" href={{ route('fabrics') }}>
                        @lang('Fabrics')
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'sustainability'  ? 'active' : '' }}">
                    <a class="nav-link text-white" href="{{ route('sustainability') }}">
                        @lang('Sustainability')
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'process'  ? 'active' : '' }}">
                    <a class="nav-link text-white" href={{ route('process') }}>
                        @lang('Process')
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'projects'  ? 'active' : '' }}">
                    <a class="nav-link text-white" href={{ route('projects') }}>
                        @lang('Projects')
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'about-us'  ? 'active' : '' }}">
                    <a class="nav-link text-white" href="{{ route('about-us') }}">
                        @lang('About us')
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'contact.view'  ? 'active' : '' }}">
                    <a class="nav-link text-white" href="{{ route('contact.view') }}">
                        @lang('Contact')
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('change-locale', [
                    'locale' => app()->getLocale() === 'nl' ? 'en' : 'nl',
                ]) }}">
                        <img src="{{ asset(app()->getLocale() === 'nl' ? 'images/flags/en.svg' : 'images/flags/nl.svg') }}"
                             alt="{{ app()->getLocale() === 'nl' ? 'en' : 'nl' }} flag" width="50" height="50">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="sticky-top p-4"></div>
