@extends('_layouts.master')

@section('body')
    <div class="main">
        <p>
            These are projects I worked on in different companies.
        </p>

        @foreach($works->reverse() as $work)
            <section class="work">
                <h3 class="section-title" id="{{ $work->anchor }}">
                    <a href="{{ $work->link }}">
                        {{ $work->title }}
                    </a>

                    <small>
                        @foreach($work->techs as $tech)
                            <kbd>{{ $tech }}</kbd>
                        @endforeach
                    </small>
                </h3>

                @if($work->images)
                    <div>
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
    </div>
@endsection
