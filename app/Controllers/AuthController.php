<?php

namespace App\Controllers;

class AuthController extends BaseController 
{
    public function signup() {
        return view('pages/singup');
    }

    public function processSignup()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            
            // Define validation rules
            $rules = [
                'name' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email|min_length[3]|max_length[50]',
                'password' => 'required|min_length[3]|max_length[50]',
            ];

            // Set the validation rules
            if (!$this->validate($rules)) {
                // Validation failed, return the form with validation errors
                return view('pages/singup', [
                    'validation' => $this->validator
                ]);
            }

            // Validation passed, process form data
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            // var_dump for debugging purpose
            var_dump($name);
            var_dump($email);
            var_dump($password);

            // Continue processing, such as saving user data to the database
        }
    }
}