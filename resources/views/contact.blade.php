@extends('layouts.pages')

@section('content')
    <div class="container">
        <h1 class="display-4">@lang('Contact')</h1>
        <p class="lead">@lang('contact.intro')</p>

        <div class="row flex-row-reverse">
            <div class="col col-12 col-lg-6">
                <h1>@lang('Contact information')</h1>
                <div class="embed-responsive embed-responsive-16by9 mb-2">
                    <iframe class="embed-responsive-item"
                            src="https://maps.google.com/maps?q=Dommel+32,+5422+VH+Gemert&t=&z=15&ie=UTF8&iwloc=&output=embed"
                            allowfullscreen loading="lazy"></iframe>
                </div>
                <p>
                    {{ config('app.name') }}<br>
                    Dommel 32<br>
                    5422 VH Gemert<br>
                    Nederland
                </p>
                <p>
                    @lang('COC number'): {{ config('ln-prints.business.coc') }}<br>
                    @lang('VAT number'): {{ config('ln-prints.business.vat') }}
                </p>
                <p>
                    <i class="fas fa-envelope fa-fw mr-1"></i>
                    <a href="mailto:{{ config('ln-prints.contact.mail') }}"
                       target="_blank">
                        {{ config('ln-prints.contact.mail') }}
                    </a><br>
                    <i class="fas fa-phone fa-fw mr-1"></i>
                    <a href="tel:{{ config('ln-prints.contact.phone') }}"
                       target="_blank">
                        {{ config('ln-prints.contact.phone') }}
                    </a>
                </p>
            </div>
            <div class="col col-12 col-lg-6">
                <h1>@lang('Contact form')</h1>
                <form method="POST" action="{{ route('contact.mail') }}" id="contact-form" class="needs-validation">
                    @csrf
                    @honeypot

                    <div class="form-group">
                        <label for="name">
                            @lang('Name') <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="@lang('Name')" required minlength="2" maxlength="255" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback" id="name-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">
                            @lang('Email') <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="@lang('Email')" required value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback" id="email-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">
                            @lang('Subject') <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="@lang('Subject')" required minlength="6" maxlength="255" value="{{ old('subject', $subject) }}">
                        @error('subject')
                        <div class="invalid-feedback" id="subject-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message">
                            @lang('Message') <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" id="message" name="message" placeholder="@lang('Message')" rows="5" required minlength="20" maxlength="300">{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback" id="message-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {!! Biscolab\ReCaptcha\Facades\ReCaptcha::htmlFormSnippet() !!}
                    <button type="submit" name="submit" class="btn btn-custom">
                        @lang('Submit')
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
