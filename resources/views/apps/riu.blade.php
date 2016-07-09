@extends('layouts.base')

@section('title', '&quot;Riu&quot; by Frank')

@section('body')

    <article class="left" itemscope itemtype="http://schema.org/Code">

        <h1 itemprop="name">
            Riu <small>&copy; 2013-2015</small>
        </h1>

        <div itemprop="about">
            <div class="shade shade-white-75 project-icon x-mobile">
                <img src="assets/img/apps/riu.png" align="right" />
            </div>

            Riu&mdash;the <em>R</em>eally <em>I</em>ntuitive <em>U</em>nit converter&mdash;is a
            simple unit converter that allows you to type out your conversion in words instead of
            scrolling through a million units. It's also an experiment of how HTML5 and other web
            technologies can make web apps look and feel like actual phone apps.
            <br /><br />

            Give it a go:
            <a href="http://riu.herokuapp.com/" target="_blank" rel="shortlink" itemprop="url">riu.herokuapp.com</a>
        </div>

        @include('apps._footer')
    </article>

@stop
