@extends('_layouts.master')

@section('title', 'Projects')

@section('body')
    <div class="main">
        @foreach($projects->reverse() as $project)
            <section class="work">
                <h3 class="section-title" id="{{ $project->anchor }}">
                    <a href="{{ $project->link }}">
                        {{ $project->title }}
                    </a>

                    <small class="work-techs-desk">
                        @foreach($project->techs as $tech)
                            <kbd>{{ $tech }}</kbd>
                        @endforeach
                    </small>
                </h3>

                <div class="work-techs-mobile">
                    @foreach($project->techs as $tech)
                        <kbd>{{ $tech }}</kbd>
                    @endforeach
                </div>

                @if($project->images)
                    <div class="work-images">
                        @foreach($project->images as $image)
                            <a href="{{ $image }}" class="image-link thumbnail">
                                <img src="{{ $image }}" class="project-{{ $project->images_layout }}" />
                            </a>
                        @endforeach
                    </div>
                @endif

                <article>
                    {!! $project->getContent() !!}
                </article>
            </section>
        @endforeach
    </div>
@endsection
