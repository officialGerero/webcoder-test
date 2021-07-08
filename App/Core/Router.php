<?php

namespace App\Core;

class Router{

    protected $routes = [];
    protected $params = [];


    public function __construct(){
        $arr = require 'App/Config/routes.php';
        foreach ($arr as $key => $val){
            $this->add($key,$val);
        }
    }

    public function add($route,$param){
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $param;
    }

    public function match(){
        $url = str_replace('/webcoder-test/','',$_SERVER['REQUEST_URI']);
        debug($url);
        foreach ($this->routes as $route => $params){
            if(preg_match($route,$url,$matches)){
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run(){
        if($this->match()){
            echo 'All good';
        }
    }
}