<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post'){
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Username Or Password didn't match"
                ]
            ];

            if (!$this->validate($rules,$errors)){
                return view('login',[
                    "validation" => $this->validator,
                ]);
            }else{
                $model = new UserModel();

                $user = $model->where('username',$this->request->getVar('username'))->first();

                $this->setUserSession($user);

                if($user['role'] == "admin"){
                    return redirect()->to(base_url('admin'));
                }elseif($user['role'] == "petugas"){
                    return redirect()->to(base_url('petugas'));
                }
            }
        }
        return view('login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'isLoggedIn' => true,
            "role" => $user['role'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    } 
}


