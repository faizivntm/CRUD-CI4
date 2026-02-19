<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        return view(name: 'login');
    }

    public function login(){
        $model = new UsersModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $users = $model->where('username', $username)->first();

        if($users){
            if(password_verify($password, $users['password'])){
                session()->set([
                    'users_id' => $users['users_id'],
                    'username' => $users['username'],
                    'logged_in' => true,
                ]);

                return redirect()->to(base_url('/dashboard'));
            } else{
                return redirect()->back()->with('error', 'password salah!');
            } 
        } else {
                return redirect()->back()->with('error', 'username salah!');
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Berhasil logout!');
    }
}
