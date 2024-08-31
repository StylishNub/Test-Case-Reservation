<?php

namespace App\Controllers;

use App\Models\AuthModel;



class Auth extends BaseController
{
    protected $Model_Auth;

    public function __construct()
    {
        helper('form');
        $this->Model_Auth = new AuthModel();
    }

    public function login()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'name' => [
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
        ])) {
            // jika valid
            $email = $this->request->getPost('name');
            $password = $this->request->getPost('password');
            $cek = $this->Model_Auth->login($email, $password);
            if ($cek) {
                //jika cocok
                session()->set('log', true);
                session()->set('id', $cek['id']);
                session()->set('name', $cek['name']);
                session()->set('email', $cek['email']);
                session()->set('password', $cek['password']);
                session()->set('level', $cek['level']);
                //percabangan admin & user
                if ($cek['level'] == 'admin') {
                    return redirect()->to(base_url('dashboard'));
                } elseif ($cek['level'] == 'approval') {
                    return redirect()->to(base_url('home'));
                }elseif ($cek['level'] == 'manager') {
                    return redirect()->to(base_url('home'));
                }
            } else {
                //jika email dan password tidak valid
                session()->setFlashdata('pesanlogin', 'Wrong Name or Password!');
                return redirect()->to(base_url('/'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errorslogin', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
