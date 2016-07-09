<?php

namespace App\Http\Controllers;

use Symfony\Component\Yaml\Yaml;

/**
 * Handles project pages.
 */
class ProjectController extends Controller
{
    /**
     * Lists projects
     */
    public function home()
    {
        // Retrieve project details.
        $projects = Yaml::parse(file_get_contents(base_path('app/projects.yaml')));

        return view('projects.index')->withProjects($projects);
    }

    /**
     * Shows the details of a project.
     *
     * @param string $name
     */
    public function project($name) {
        return view('projects.'. $name);
    }
}
