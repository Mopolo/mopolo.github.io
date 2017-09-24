@extends('_layouts.master')

@section('title', 'Experience')

@section('body')
    <div class="main">

        @foreach($experiences->reverse() as $experience)
            <section class="section experience">
                <header>
                    {{ $experience->title }} &mdash; {{ $experience->location }}
                    <small>
                        {!! $page->period($experience->start, $experience->end) !!}
                    </small>
                </header>
                <article>
                    {!! $experience->getContent() !!}

                    @foreach($page->getWorks($works, $experience->id) as $work)

                        <section class="work">
                            <h3 class="section-title" id="{{ $work->anchor }}">
                                <a href="{{ $work->link }}">
                                    {{ $work->title }}
                                </a>

                                <small class="work-techs-desk">
                                    @foreach($work->techs as $tech)
                                        <kbd>{{ $tech }}</kbd>
                                    @endforeach
                                </small>
                            </h3>

                            <div class="work-techs-mobile">
                                @foreach($work->techs as $tech)
                                    <kbd>{{ $tech }}</kbd>
                                @endforeach
                            </div>

                            @if($work->images)
                                <div class="work-images">
                                    @foreach($work->images as $image)
                                        <a href="{{ $image }}" class="image-link thumbnail">
                                            <img src="{{ $image }}" class="project-{{ $work->images_layout }}" />
                                        </a>
                                    @endforeach
                                </div>
                            @endif

                            <article>
                                {!! $work->getContent() !!}
                            </article>
                        </section>

                    @endforeach
                </article>
            </section>
        @endforeach

    </div>
@endsection
