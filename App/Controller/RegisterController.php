<?php

namespace App\Controller;

use App\Controller\Contracts\Controller;

class RegisterController extends Controller{


    public function index()
    {
        view('register.index');

    }

    public function store()
    {
        $data = [
            'name' => $this->request->params['name'],
            'pass' => password_hash($this->request->params['password'],PASSWORD_BCRYPT),
            'desc' => '',
            'role' => 'user',
        ];

        $userCreated = $this->user->create($data);

        if($userCreated['status'] === false) {
            
            $_SESSION['msg'] = $userCreated;
            return header("location:".echoRoute('register'));
        }
        
        $_SESSION['msg'] = $userCreated;
        $_SESSION['user_id'] = $userCreated['id'];
        return header("location:".echoRoute('userdetail'));
    }

}