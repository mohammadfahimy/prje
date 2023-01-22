<?php
namespace App\Controller;

use App\Controller\Contracts\Controller;

class LoginController extends Controller {


    public function index() 
    {
        view('login.index');
    }

    public function logoute()
    {
        unset($_SESSION['user_id']);
        $_SESSION['msg'] = [
            'status' => true,
            'msg' => 'با موفقیت خارج شدید',
        ];
        return header('location:'.echoRoute('login'));
        
    }

    public function store()
    {
        
        $data = [
            'name' => $this->request->params['name'],
            'password' => $this->request->params['password'],
        ];

        $userFind = $this->user->haveUser($data);
        if($userFind)
        {
            $_SESSION['user_id'] = $userFind['id'];
            $_SESSION['user_role'] = $userFind['role'];

            $_SESSION['msg'] = [
                'msg' => 'خوش آمدید ',
                'status' => true,
            ];
            if($userFind['role'] == 'admin'){
                return header('location:'.echoRoute('showall'));
            }
            return header('location:'.echoRoute('userdetail'));
        }
        
        $_SESSION['msg'] = [
            'msg' => 'نام و یا رمز عبور شما اشتباه میباشد',
            'status' => false,
        ];
        return header('location:'.echoRoute('login'));
    }
}