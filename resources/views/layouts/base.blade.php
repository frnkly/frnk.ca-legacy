<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>@yield('title', 'Francis Amankrah')</title>
    <!-- 15 -->

	@section('head')
        <base href="/">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<meta name="author" content="Francis Amankrah" />
		<meta name="description" content="Yaw &quot;Frank&quot; Amankrah" />
		<meta name="keywords" content="Francis Amankrah" />
		<meta name="robots" content="index, follow" />
		<meta property="og:title" content="Francis Amankrah" />
		<meta property="og:desc" content="Yaw &quot;Frank&quot; Amankrah" />
		<meta property="og:type" content="website" />
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Julius+Sans+One" />
		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" />
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/main.css?170806d" />
		<link rel="stylesheet" media="handheld, screen and (min-width: 620px)" type="text/css" href="assets/css/620.css?170806d" />

		{{-- Use a random background on every page load. --}}
		@inject('randomBackground', 'App\Services\RandomBackground')
		{!! $randomBackground->renderCss() !!}
	@show
</head>
<body>
	@yield('body')

	<footer>
	    <a href="{{ route('home') }}">frnk.ca</a>

        <div class="bg-info">
            <a href="{!! $randomBackground->getProjectUri() !!}">
                Background image: {{ $randomBackground->getProjectName() }}
            </a>

            @if ($randomBackground->getCredits())
                <a href="{!! $randomBackground->getCreditsUri() !!}" target="_blank">
                    (credits: {{ $randomBackground->getCredits() }})
                </a>
            @endif
        </div>
	</footer>
</body>
</html>
