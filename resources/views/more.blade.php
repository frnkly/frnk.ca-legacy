@extends('layouts.base')

@section('body')

    <article itemscope itemtype="http://schema.org/Person">
        <h1>A little background</h1>

        <div class="portrait"><div class="shade shade-0"></div></div>

        I <a href="{{ route('apps') }}">make web apps</a> built on renowned frameworks and libraries
        such as <a href="https://symfony.com" target="_blank">Symfony</a> and
        <a href="https://laravel.com/" target="_blank">Laravel</a>. This makes me a renowned developer (I think). I
        focus on writing clear, object-oriented code that's straightforward and easy to
        build on.

        <br>
        <br>
        My favourite project right now is called <a href="https://www.doraboateng.com" target="_blank">Dora Boateng</a>
        (open-sourced on <a href="https://github.com/doraboateng" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>).

        <br />
        <br />
        I'm also a graduate of <a href="http://www.concordia.ca/" target="_blank">Concordia University</a> (BEng '14)
        based out of <span itemprop="addressLocality">Montreal</span>,
        <span itemprop="addressCountry">Canada</span>, with a predilection for
        <em>social innovation</em> and <em>entrepreneurship</em>.
    </article>

@stop
