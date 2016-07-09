<?php

namespace App\Http\Controllers;

/**
 * Handles most pages.
 */
class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Home.
     */
    public function home() {
        return view('home');
    }

    /**
     * More me.
     */
    public function more() {
        return view('more');
    }
}
