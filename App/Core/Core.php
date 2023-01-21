<?php
namespace App\Core;

use App\Core\Routes\Route;

class Core {

    private $routes;
    private $request;
    private $currentRoute;

    public const BASE_NAME_SPACE = 'App\controller\\';

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::getRoutes();
        $this->currentRoute =  $this->currentRoute() ;
        
    }

    public function currentRoute()
    {
        
        foreach ($this->routes as $route)
        {

            if(!in_array($this->request->getMethod(),$route['methods']))
            {
                continue;
            }
            if ( $this->regexMatch($route['uri'])){
                return $route;
            }
            
        }

        return null;
    }

    public function regexMatch($uri){
        
        $pattern = "/^". str_replace(['/','{','}'],['\/', '(?<','>[-%\w]+)'],rtrim($uri)) ."$/";
        $result = preg_match($pattern,$this->request->getUri(),$matchs);
        
        foreach($matchs as $key => $value){

            if(!is_int($key)){

                $this->request->setParams($key , $value);

            }
        }

        if(!$result){
            return false;
        }
        return true;

    }

    public function runRoute()
    {

        $this->dispatch();
    }

    public function dispatch()
    {
        if(is_array($this->currentRoute['action']))
        {
            $this->currentRoute['action'][0];

            $className = self::BASE_NAME_SPACE.$this->currentRoute['action'][0];
            $method = $this->currentRoute['action'][1];

            if(!class_exists($className))
            {
                throw new \Exception('dont have this Class');
            }

            $object = new $className($this->request);

            if(!method_exists($object,$method)){
                
                throw new \Exception('dont have this Method');
            }

            $object->$method();

        }
    }
}