<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        // Updated to use is('post')
        if ($this->request->is('post')) {
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required'
            ];

            if ($this->validate($rules)) {
                $model = new UserModel();
                $user = $model->where('email', $this->request->getPost('email'))->first();

                if ($user && password_verify($this->request->getPost('password'), $user['password_hash'])) {
                    session()->set(['isLoggedIn' => true, 'userData' => $user]);
                    return redirect()->to('/dashboard');
                }
                return redirect()->back()->with('error', 'Invalid login credentials');
            }
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        return view('auth/login');
    }

    public function register()
    {
        // Updated to use is('post')
        if ($this->request->is('post')) {
            $rules = [
                'name'             => 'required|max_length[255]',
                'email'            => 'required|valid_email|is_unique[users.email]',
                'password'         => 'required|min_length[8]',
                'password_confirm' => 'required|matches[password]'
            ];

            if ($this->validate($rules)) {
                $model = new UserModel();
                $model->save([
                    'name'          => $this->request->getPost('name'),
                    'email'         => $this->request->getPost('email'),
                    'password_hash' => $this->request->getPost('password')
                ]);
                return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
            }
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        return view('auth/register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}