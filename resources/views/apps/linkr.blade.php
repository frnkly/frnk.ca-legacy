@extends('layouts.base')

@section('title', '&quot;Linkr&quot; by Frank')

@section('body')

    <article class="left" itemscope itemtype="http://schema.org/Code">

        <h1 itemprop="name">
            Linkr <small>&copy; 2008-2012</small>
        </h1>

        <div itemprop="about">

            <div class="shade shade-white-75 project-icon">
                <img src="assets/img/apps/linkr.png" style="width:100px;" align="right" />
            </div>

            Linkr was a <a href="http://www.joomla.org" target="_blank">Joomla!</a> extension that
            simplified the task of linking to internal articles within Joomla! websites. With well
            over 100,000 downloads throughout its life, it was
            popular back when there was no easy way to achieve this. Now that the feature is
            directly integrated since <a href="http://www.joomla.org/3/en" target="_blank">Joomla! 3.0</a>,
            there's no point to continue maintaining this code :)
            <br /><br />

            <div class="center">

                <a href="http://joomlacode.org/gf/project/linkr2/" target="_blank">
                    Find Linkr on JoomlaCode.org
                </a>
                <br />

                <a href="http://joomlacode.org/gf/download/frsrelease/16282/70755/%6c%69%6e%6b%72%2e%73%75%70%65%72%5f%69%6e%73%74%61%6c%6c%65%72%5f%32%2e%33%2e%39%2e%7a%69%70">
                    Download the last release
                </a>
            </div>
        </div>

        <h2>License</h2>
        <div class="license">
            Linkr is free software: you can redistribute it and/or modify it under the terms of the
            <a href="http://www.gnu.org/licenses/gpl.html" target="_blank" rel="license">GNU General
            Public License</a> as published by the <a href="http://www.fsf.org/" target="_blank">Free
            Software Foundation</a>.
            <br /><br />

            Linkr is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
            without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
            See the <a href="http://www.gnu.org/licenses/gpl.html" target="_blank" rel="license">GNU
            General Public License</a> for more details.
            <br /><br />
        </div>

        <h2>Credits</h2>
        <div class="credits">
            Thanks to <a href="http://rusmar-solutions.com/" target="_blank">Ralig</a> for the coding help.
            <br />

            Thanks to <a href="http://www.davidboggitt.com/" target="_blank">David Boggitt</a>, a Web
            designer, for suggestions and debugging help.<br />

            Thanks to the developers at <a href="http://www.xhtmlsuite.com/" target="_blank">XHTMLSuite</a>
            for the help integrating Linkr with their editor.<br />

            Thanks to <a href="http://www.burcio.org/" target="_blank">Giovanni Genovino</a> for the
            Italian translations.<br />

            Thanks to <a href="http://www.simpatic.ro/", target="_blank">Vlad Georgescu</a> for the
            Romanian translations.<br />

            Thanks to Alexander Yevgenov for the Russian translations.<br />

            Thanks to Craig Tislar for the Estonian translations.<br />

            Thanks to <a href="http://www.lindaofsweden.se/" target="_blank">Linda Maltanski</a> for
            the Swedish translations.
        </div>

        @include('apps._footer')

    </article>

@stop
