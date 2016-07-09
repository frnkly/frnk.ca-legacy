<?php

namespace App\Services;

use Symfony\Component\Yaml\Yaml;

/**
 *
 */
class RandomBackground
{
    /**
     * @var array
     */
    private $bg = [];

    /**
     *
     */
    public function __construct()
    {
        // Pick a random background.
        $backgrounds = Yaml::parse(file_get_contents(base_path('app/backgrounds.yaml')));
        $this->bg = $backgrounds[mt_rand(0, sizeof($backgrounds) - 1)];
    }

    /**
     * CSS for the random background.
     *
     * @return string
     */
    public function renderCss()
    {
        return
            '<style type="text/css">'.
                'html {'.
                    'background-image: url('. $this->getScaledSrc() .');'.
                '}'.
                '@media(min-width: 600px) {'.
                    'html {'.
                        'background-image: url('. $this->getLargeSrc() .');'.
                    '}'.
                '}'.
            '</style>';
    }

    public function getProjectUri()
    {
        $uri = array_get($this->bg, 'project-route', '');
        $uri = strlen($uri) ? route('project', ['name' => $uri]) : 'javascript:;';

        return $uri;
    }

    public function getProjectName() {
        return array_get($this->bg, 'project-name');
    }

    public function getCredits() {
        return array_get($this->bg, 'credits', false);
    }

    public function getCreditsUri() {
        return array_get($this->bg, 'credits-uri', route('home'));
    }

    public function getScaledSrc() {
        return '/assets/img/bg/'. array_get($this->bg, 'src-scaled');
    }

    public function getLargeSrc() {
        return '/assets/img/bg/'. array_get($this->bg, 'src-large');
    }
}
