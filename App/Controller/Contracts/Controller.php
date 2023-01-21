<?php

namespace App\Controller\Contracts;

use App\Core\Request;
use App\Models\UserModel;

class Controller{

    protected $request;
    protected $user;

    public function __construct(Request $request) 
    {
        $this->request = $request;
        $this->user = new UserModel();
    }

}