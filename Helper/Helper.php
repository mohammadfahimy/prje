<?php


function dd($varDump){

    echo '<pre style="border-left: 4px solid red; font-size: 18px; font-family: tahoma; padding: 12px; line-height: 1.6;">';
        var_dump($varDump);
    echo '</pre>';
    die();
}


function view($path, $data = [])
{
    extract($data);
    
    $newPath = str_replace('.', '/', $path);
    echo include VIEW_PATH . 'layouts/header.php';
    echo include VIEW_PATH. $newPath . '.php';
    echo include VIEW_PATH . 'layouts/footer.php';
    
}

function echoRoute($path)
{
    return BASE_URI.$path;
}