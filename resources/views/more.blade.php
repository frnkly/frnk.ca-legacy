@extends('layouts.base')

@section('body')

    <article itemscope itemtype="http://schema.org/Person">

        <h1>A little background</h1>

        <div class="portrait"><div class="shade shade-0"></div></div>

        I <a href="{{ route('apps') }}">develop web apps</a> built on renowned frameworks and libraries
        such as Symfony and Laravel. This makes me a renowned developer (I think). I
        focus on writing clear, object-oriented code that's straightforward and easy to
        build on. My favourite project right now is called
        <a href="http://dinkomo.frnk.ca" target="_blank">Di Nkomo</a>.

        <br />
        <br />
        <!-- I'm currently a Software Developer &amp; Research Analyst at a startup called
        <a href="http://heddoko.com/" target="_blank">Heddoko</a> and a  volunteer at
        <a href="http://ladieslearningcode.com/" target="_blank">Ladies Learning Code</a> and
        <a href="http://kidscodejeunesse.org/" target="_blank">Kids Code Jeunesse</a>. -->
        At the moment, I'm somewhere in West Africa, freelancing and discovering the world.
        I'm also a graduate of Concordia University (BEng '14) based out of
        <span itemprop="addressLocality">Montreal</span>,
        <span itemprop="addressCountry">Canada</span>, with a predilection for
        <em>social innovation</em> and <em>entrepreneurship</em>.

    </article>

@stop
