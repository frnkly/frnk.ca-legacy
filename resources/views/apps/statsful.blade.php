@extends('layouts.base')

@section('head.title', '&quot;Statsful&quot; by Frank')

@section('body')

    <article class="left" itemscope itemtype="http://schema.org/Code">

        <h1 itemprop="name">
            Statsful <small>&copy; 2009-2011</small>
        </h1>

        <div itemprop="about">
            <div class="shade shade-white-75 project-icon x-mobile">
                <img src="assets/img/apps/statsful.png" style="width:200px;" align="right" />
            </div>

            Statsful was a <a href="http://www.joomla.org" target="_blank">Joomla!</a>-based,
            specialty social network. It featured user profiles, pictures, videos, stats, and
            other elements specific to the target audience.
        </div>

        @include('apps._footer')
    </article>

@stop
