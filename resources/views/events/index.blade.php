@extends ('layout')

@section ('content')

<div id="wrapper">
    <div id="page" class="container">

        @forelse ($events as $event)
        <div id="content">
            <div class="title">
                <a href="/events/{{ $event->id}}">

                    <h2>{{ $event->event_name }}</h2>
                </a>
                <p>
                    <img src="/images/banner.jpg" alt="" class="image image-full" />
                </p>
                <p>
                    {!! $article->start_dt !!}
                </p>
            </div>
        </div>

        @empty
        <p> No relevant articles yet. </p>

        @endforelse
    </div>
</div>

@endsection