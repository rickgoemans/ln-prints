{{-- Footer --}}
<footer class="sticky-footer mt-3 p-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col col-12 col-lg-6">
                &copy; 2020 @if(date('Y') != 2020) - {{ date('Y') }} @endif {{ config('app.name') }}
            </div>
            <div class="col col-12 col-lg-6 text-lg-right">
                <a href="{{ config('ln-prints.social_media.facebook') }}" target="_blank" class="btn btn-fb mr-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="{{ config('ln-prints.social_media.instagram') }}" target="_blank" class="btn btn-ins mr-2">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="{{ config('ln-prints.social_media.linkedin') }}" target="_blank" class="btn btn-li">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
{{-- /Footer --}}
