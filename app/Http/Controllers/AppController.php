<?php

namespace App\Http\Controllers;

use Symfony\Component\Yaml\Yaml;

/**
 * Handles app pages.
 */
class AppController extends Controller
{
    /**
     * Lists apps.
     */
    public function home()
    {
        // Retrieve app details.
        $apps = Yaml::parse(file_get_contents(base_path('app/apps.yaml')));

        return view('apps.index')->withApps($apps);
    }

    /**
     * Shows the app page.
     *
     * @param string $name
     */
    public function app($name) {
        return view('apps.'. $name);
    }
}
