@extends('_layouts.master')

@section('body')
    <div class="main">
        <p>
            These are personal projects.
        </p>

        @foreach($projects->reverse() as $project)
            <section class="work">
                <h3 class="section-title" id="{{ $project->anchor }}">
                    <a href="{{ $project->link }}">
                        {{ $project->title }}
                    </a>

                    <small>
                        @foreach($project->techs as $tech)
                            <kbd>{{ $tech }}</kbd>
                        @endforeach
                    </small>
                </h3>

                @if($project->images)
                    <div>
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
