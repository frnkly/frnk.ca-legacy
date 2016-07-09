@extends('layouts.base')

@section('body')

    <article class="projects">
        <h1>People I've worked with</h1>

        @foreach ($projects as $project)

            @include('layouts._tile', [
                'type' => 'project',
                'name' => $project['name'],
                'route' => $project['route']
            ])

        @endforeach

	    <div class="clear"></div>
    </article>

@stop
