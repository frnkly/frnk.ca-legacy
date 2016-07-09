@extends('layouts.base')

@section('body')

    <article itemscope itemtype="http://schema.org/Person">

        <h1 class="bigger">Hello <small style="display: inline-block; transform: rotate(90deg)">:)</small></h1>

        I'm Yaw <a href="{{ route('more') }}"><i>&ldquo;<span itemprop="name">Frank</span>&rdquo;</i></a> Amankrah.
        I spend half of my time <a href="{{ route('apps') }}">programming</a>.
        {{-- The other half I invest <a href="{{ route('projects') }}">back into the world</a>. --}}
        The other half I invest back into the world.
        <br />
        <br />

        <i class="fa fa-hand-o-right fa-lg" style="margin-right: 10px"></i>
        <a href="http://www.linkedin.com/in/francisamankrah" target="_blank">LinkedIn</a>
        <a href="https://github.com/frnkly" target="_blank">Github</a>
        <a href="mailto:&#102;&#114;&#97;&#110;&#107;&#64;&#102;&#114;&#110;&#107;&#46;&#99;&#97;">
            &#102;&#114;&#97;&#110;&#107;&#64;&#102;&#114;&#110;&#107;&#46;&#99;&#97;
        </a>

    </article>

@stop
