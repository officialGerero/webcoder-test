<?php


namespace App\Core;


abstract class View {

    public $path;
    public $layout = 'default';

    public function __construct($route) {
        $this->route = $route;
    }
}