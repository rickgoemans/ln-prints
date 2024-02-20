<p class="mt-8 text-center text-xs text-80">
    <a href="{{ config('app.url') }}" class="text-primary dim no-underline">{{ config('app.name') }}</a>
    <span class="px-1">&middot;</span>
    &copy; {{ date('Y') }} {{ config('app.name') }}
    <span class="px-1">&middot;</span>
    Laravel v{{ app()->version() }}
    <span class="px-1">&middot;</span>
    Nova v{{ \Laravel\Nova\Nova::version() }}
</p>
