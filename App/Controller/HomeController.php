<?php
namespace App\Controller;

use App\Controller\Contracts\Controller;

class HomeController extends Controller {


    public function index() 
    {
        
        return view('home.index');
    }
}