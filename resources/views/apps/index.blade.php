@extends('layouts.base')

@section('body')

    <article class="projects">
        <h1>
            Some of my favourite work
        </h1>

        @foreach ($apps as $app)

            @include('layouts._tile', [
                'type' => 'app',
                'name' => $app['name'],
                'route' => $app['route']
            ])

        @endforeach

	    <div class="clear"></div>
    </article>

@stop
