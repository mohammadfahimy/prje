<?php

namespace App\Core;

class Request{

    public $method;
    public $uri;
    public $params;

    public function __construct() {

        $this->uri = rtrim(strtok($_SERVER['REQUEST_URI'],'?'));
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->params = $_REQUEST;
    }


    public function getMethod() {
        return $this->method;
    }

    public function getUri() {
        return $this->uri;
    }

    public function getParams() {
        return $this->params;
    }

    public function setParams($key, $value) 
    {
        return $this->params[$key] = $value;
    }
}