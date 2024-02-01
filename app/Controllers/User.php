<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class User extends BaseController
{

    public function index()
    {
        //
        $user = new UserModel;
        $data['users'] = $user->findAll();
        return view('admin/user',$data);
    }
    public function store()
    {
        $user = new UserModel;
        $user->insert($this->request->getPost());
        return redirect('user')->with('success','User Berhasil Ditambah');
    }
    public function edit($id)
    {
        $user = new UserModel; 
        $datauser = $user->find($id);
        return view("admin/edituser",['datauser'=>$datauser]);
    }
    public function update()
    {
        $user  = new UserModel;
        $user->update($this->request->getPost('userid'),$this->request->getPost());
        return redirect('user')->with("success","Data berhasil diupdate");
    }
    public function delete($id)
    {
        $user = new userModel;
        $user->delete($id);
        return redirect('user')->with('success','Data berhasil diHapus');
    }
}
