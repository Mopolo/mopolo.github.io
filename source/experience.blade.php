@extends('_layouts.master')

@section('title', 'Experience')

@section('body')
    <div class="main">

        @foreach($experiences->reverse() as $experience)
            <section class="section experience card">
                <header>
                    {{ $experience->title }} &mdash; {{ $experience->location }}
                    <small>
                        {!! $page->period($experience->start, $experience->end) !!}
                    </small>
                </header>
                <article>
                    <div class="experience-content experience-description">
                        {!! $experience->getContent() !!}
                    </div>

                    @foreach($page->getWorks($works, $experience->id) as $work)

                        <section class="work experience-content">
                            <h4 class="work-title">
                                @if($work->link)
                                    <a class="link" href="{{ $work->link }}">
                                        {{ $work->title }}
                                    </a>
                                @else
                                    {{ $work->title }}
                                @endif
                            </h4>

                            @if($work->images)
                                <div class="work-images">
                                    @foreach($work->images as $image)
                                        <a href="{{ $image }}" class="image-link thumbnail">
                                            <img src="{{ $image }}" class="project-{{ $work->images_layout }}" />
                                        </a>
                                    @endforeach
                                </div>
                            @endif

                            <article class="work-content">
                                {!! $work->getContent() !!}
                            </article>

                            <div class="techs">
                                Technologies:
                                @foreach($work->techs as $tech)
                                    <kbd>{{ $tech }}</kbd>
                                @endforeach
                            </div>
                        </section>

                    @endforeach
                </article>
            </section>
        @endforeach

    </div>
@endsection
