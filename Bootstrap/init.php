<?php
session_start();
define('BASE_PATH',dirname(__DIR__));
define('BASE_URI','http://localhost/jooyeshgar/');
define('VIEW_PATH', BASE_PATH.'/views/');


function autoload($class){

    
    $fileName =  $class.'.php';

    if(file_exists($fileName)){
        include $fileName;
    }else{
        die("not found this $fileName");
    }

}

spl_autoload_register('autoload');

include 'Routes/web.php';
include 'Helper/Helper.php';    