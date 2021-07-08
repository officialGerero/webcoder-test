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
            $path = 'App\Controllers\\'.ucfirst($this->params['controller'].'Controller');
            if(class_exists($path)){
                $action = $this->params['action'];
                if(method_exists($path,$action)){
                    $controller = new $path($this->params);
                    $controller->$action();
                }else {
                    echo 'Action doen`t exists';
                }
            }else {
                echo 'Class'.$path.' wasn`t found';
            }
        }else {
            echo 'Route wasn`t found';
        }
    }
}