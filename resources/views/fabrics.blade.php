@php use App\Support\Enums\MediaConversions; @endphp
@extends('layouts.pages')

@section('content')
    <div class="container">
        <h1 class="display-4">@lang('Fabrics')</h1>
        <p class="lead">
            @lang('fabrics.intro')
        </p>

        @foreach($fabrics as $fabric)
            <div class="card mb-4">
                <div class="row no-gutters {{ $loop->even ? 'flex-row-reverse' : '' }}">
                    <div class="col-md-4">
                        @if($fabric->getMedia('images'))
                            <div id="fabric-{{ $fabric->id }}-carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($fabric->getMedia('images') as $media)
                                        <li data-target="#fabric-{{ $fabric->id }}-carousel" data-slide-to="{{ $loop->index }}" @if($loop->first) class="active" @endif ></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner lightGallery" id="lightGallery">
                                    @foreach($fabric->getMedia('images') as $media)
                                        <a class="carousel-item {{ $loop->first ? 'active' : '' }}" href="{{ $media->getUrl() }}">
                                            <img src="{{ $media->getUrl(MediaConversions::Thumbnail->value) }}" class="d-block w-100" alt="{{ $fabric->name }} photo {{ $loop->iteration }}" loading="lazy">
                                        </a>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#fabric-{{ $fabric->id}}-carousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#fabric-{{ $fabric->id}}-carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">
                                {{ $fabric->name }}
                            </h2>
                            <div class="row">
                                <div class="col-3">
                                    @lang('Article number'):
                                </div>
                                <div class="col-9">
                                    {{ $fabric->article_number}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    @lang('Composition'):
                                </div>
                                <div class="col-9">
                                    {{ $fabric->composition }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    @lang('Usable width'):
                                </div>
                                <div class="col-9">
                                    {{ $fabric->usable_width }} cm
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    @lang('Weight'):
                                </div>
                                <div class="col-9">
                                    {{ $fabric->weight}} gr/m<sup>2</sup>
                                </div>
                            </div>
                            <p class="card-text mt-3">
                                @if(app()->getLocale() == 'en')
                                    {!! $fabric->en_description !!}
                                @else
                                    {!! $fabric->nl_description !!}
                                @endif
                            </p>
                            <p class="card-text">
                                @if($fabric->two_way_stretch)
                                    <img src="{{ asset('images/fabrics/icons/two_way_stretch.png') }}" alt="@lang('fabrics.tooltips.two_way_stretch') icon" class="m-2" width="50" height="50"
                                         data-toggle="tooltip" data-placement="top" title="@lang('fabrics.tooltips.two_way_stretch')">
                                @endif
                                @if($fabric->pilling_resistant)
                                    <img src="{{ asset('images/fabrics/icons/pilling_resistant.png') }}" alt="@lang('fabrics.tooltips.pilling_resistant') icon" class="m-2" width="50" height="50"
                                         data-toggle="tooltip" data-placement="top" title="@lang('fabrics.tooltips.pilling_resistant')">
                                @endif
                                @if($fabric->wrinkle_free_and_easy_care)
                                    <img src="{{ asset('images/fabrics/icons/wrinkle_free_and_easy_care.png') }}" alt="@lang('fabrics.tooltips.wrinkle_free_and_easy_care') icon" class="m-2" width="50"
                                         height="50" data-toggle="tooltip" data-placement="top" title="@lang('fabrics.tooltips.wrinkle_free_and_easy_care')">
                                @endif
                                @if($fabric->quick_dry)
                                    <img src="{{ asset('images/fabrics/icons/quick_dry.png') }}" alt="@lang('fabrics.tooltips.quick_dry') icon" class="m-2" width="50" height="50"
                                         data-toggle="tooltip" data-placement="top" title="@lang('fabrics.tooltips.quick_dry')">
                                @endif
                                @if($fabric->breathable)
                                    <img src="{{ asset('images/fabrics/icons/breathable.png') }}" alt="@lang('fabrics.tooltips.breathable') icon" class="m-2" width="50" height="50"
                                         data-toggle="tooltip" data-placement="top" title="@lang('fabrics.tooltips.breathable')">
                                @endif
                                @if($fabric->moisture_management)
                                    <img src="{{ asset('images/fabrics/icons/moisture_management.png') }}" alt="@lang('fabrics.tooltips.moisture_management') icon" class="m-2" width="50" height="50"
                                         data-toggle="tooltip" data-placement="top" title="@lang('fabrics.tooltips.moisture_management')">
                                @endif
                                @if($fabric->muscle_control)
                                    <img src="{{ asset('images/fabrics/icons/muscle_control.png') }}" alt="@lang('fabrics.tooltips.muscle_control') icon" class="m-2" width="50" height="50"
                                         data-toggle="tooltip" data-placement="top" title="@lang('fabrics.tooltips.muscle_control')">
                                @endif
                                @if($fabric->uv_protection)
                                    <img src="{{ asset('images/fabrics/icons/uv_protection.png') }}" alt="@lang('fabrics.tooltips.uv_protection') icon" class="m-2" width="50" height="50"
                                         data-toggle="tooltip" data-placement="top" title="@lang('fabrics.tooltips.uv_protection')">
                                @endif
                                @if($fabric->recycled_yarn)
                                    <img src="{{ asset('images/fabrics/icons/recycled_yarn.png') }}" alt="@lang('fabrics.tooltips.recycled_yarn') icon" class="m-2" width="50" height="50"
                                         data-toggle="tooltip" data-placement="top" title="@lang('fabrics.tooltips.recycled_yarn')">
                                @endif

                            </p>
                            <p class="card-text">
                                <a type="button" class="btn btn-custom" href="{{ route('contact.view', [
                                    'subject' => __('Fabric') . " {$fabric->name}",
                                 ]) }}">
                                    <i class="fas fa-fw fa-envelope mr-1"></i> @lang('Contact')
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <h2 class="display-5">@lang('fabrics.care_instructions')</h2>
        <p class="lead">
            @lang('fabrics.care_instructions_text')
        </p>
    </div>
@endsection
