<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// General pages.
$app->get('/',          ['as' => 'home', 'uses' => 'PageController@home']);
$app->get('/more',      ['as' => 'more', 'uses' => 'PageController@more']);
$app->get('/thoughts',  ['as' => 'thoughts', 'uses' => 'PageController@thoughts']);

// Apps & projects
$app->get('/work',              ['as' => 'apps', 'uses' => 'AppController@home']);
$app->get('/work/{name}',       ['as' => 'app', 'uses' => 'AppController@app']);
$app->get('/projects',          ['as' => 'projects', 'uses' => 'ProjectController@home']);
$app->get('/projects/{name}',   ['as' => 'project', 'uses' => 'ProjectController@project']);

// Redirects.
$app->get('/home', function() {
    return redirect(route('home'));
});
$app->get('/apps', function() {
    return redirect(route('apps'));
});
$app->get('/thought', function() {
    return redirect(route('blog'));
});
$app->get('/thouhgts', function() {
    return redirect(route('blog'));
});
$app->get('/toughts', function() {
    return redirect(route('blog'));
});
