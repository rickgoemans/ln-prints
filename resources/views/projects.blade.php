@php use App\Support\Enums\MediaConversions; @endphp
@extends('layouts.pages')

@section('content')
    <div class="container">
        <h1 class="display-4">@lang('Projects')</h1>
        <p class="lead">
            @lang('projects.intro')
        </p>

        @foreach($projects as $project)
            <div class="card mb-4">
                <div class="row no-gutters {{ $loop->even ? 'flex-row-reverse' : '' }}">
                    <div class="col-md-8">
                        @if($project->getMedia('images'))
                            <div id="fabric-{{$project->id}}-carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($project->getMedia('images') as $media)
                                        <li data-target="#fabric-{{$project->id}}-carousel" data-slide-to="{{ $loop->index }}" @if($loop->first) class="active" @endif ></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner lightGallery">
                                    @foreach($project->getMedia('images') as $media)
                                        <a class="carousel-item {{ $loop->first ? 'active' : '' }}" href="{{ $media->getUrl() }}">
                                            <img src="{{ $media->getUrl(MediaConversions::Thumbnail->value) }}" class="d-block w-100" alt="{{ $project->name }} photo {{ $loop->iteration }}" loading="lazy">
                                        </a>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#fabric-{{ $project->id }}-carousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#fabric-{{ $project->id }}-carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <h2 class="card-title">
                                @if(app()->getLocale() == 'en')
                                    {{ $project->en_name }}
                                @else
                                    {{ $project->nl_name }}
                                @endif
                            </h2>
                            <p class="card-text">
                                @if(app()->getLocale() == 'en')
                                    {!! $project->en_description !!}
                                @else
                                    {!! $project->nl_description !!}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
