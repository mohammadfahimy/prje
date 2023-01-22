<?php
namespace App\Controller;
use App\Controller\Contracts\Controller;

class UserController extends Controller{


    public function index()
    {
        if (isset($_SESSION['user_id'])) {

            $id = $_SESSION['user_id'];
            $user =  $this->user->read($id);

           return view('userpage.userdetail', $user);
        }
        return header("location:".echoRoute('login'));
    }

    public function edit()
    {
        if (isset($_SESSION['user_id'])) {

            $id = $this->request->params['id'];
            $data = [
                'user' => $this->user->read($id),
                'role' => ['admin','user'],
            ];
            // $user =  $this->user->read($id);
            return view('userpage.useredit', $data);
        }
        return header("location:".echoRoute('login'));
    }

    public function update()
    {

        $data = $this->user->update([
            'name' => $this->request->params['name'],
            'password' => $this->request->params['password'],
            'id' => $this->request->params['id'],
        ]);

        if($data){

            $_SESSION['msg'] = [
                'msg' => 'اطلاعات شما باموفقیت بروزرسانی شد',
                'status' => true
            ];
           return header("location:".echoRoute('userdetail'));
        }

        $_SESSION['msg'] = [
            'msg' => 'اطلاعات شما بروزرسانی نشد',
            'status' => false
        ];
        return header("location:".echoRoute('userdetail'));
    }

    
    public function showall()
    {
        if(isset($_SESSION['user_id'])){

            if($this->user->isUserAdmin($_SESSION['user_id']) == 'admin'){

                $users = $this->user->getAllUser();
                return view('userpage.showall',$users);
            }

            $_SESSION['msg'] = [
                'status' => false,
                'msg' => 'شما دسترسی کافی برای این صفحه را ندارید',
            ];
            return header('location:'.echoRoute('userdetail'));
        }

        return header('location:'.echoRoute('login'));
    }

    public function showDescription()
    {
        $data =[
            'description' => $this->user->getDescription($this->request->params['id']),
            'id' => $this->request->params['id'],
        ] ;
        view('userpage.description',$data);
    }

    public function updateDescription()
    {
        
        $ss = $this->user->updateDescription([
            'description' => $this->request->params['description'],
            'id' => $this->request->params['id'],
        ]);

        if($ss){

            $_SESSION['msg'] = [
                'msg' => 'توضیحات شما با موفقیت بروز شد',
                'status' => true 
            ];
            header('location:'. echoRoute('userdetail'));
        }
    }

}