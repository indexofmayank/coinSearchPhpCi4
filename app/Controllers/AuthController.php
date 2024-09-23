<?php

namespace App\Controllers;

use App\Models\Users as UserModel;

class AuthController extends BaseController 
{
    public function signup() {
        return view('pages/singup');
    }

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function processSignup()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            
            // Define validation rules
            $rules = [
                'name' => 'required|min_length[4]|max_length[15]',
                'email' => 'required|valid_email|min_length[3]|max_length[50]',
                'password' => [
                'rules' => 'required|min_length[8]|max_length[15]|regex_match[/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).+$/]',
                'errors' => [
                    'regex_match' => 'Password must be 8 to 15 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.'
                ]
            ]            
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
            $data=[
                'name' => $name,
                'email' => $email,
                'password' => $password
            ];
            $result = $this->userModel->createUser($data);
            session()->set('user_name', $name);
            return redirect()->to('homepage');
        }
    }

    public function processLogin()
    {
        helper(['form']);
    
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');    
    
            // Load the Users model
            $userModel = new \App\Models\Users();
    
           // Attempt to find the user by email
            $user = $userModel->where('email', $email)->first();
    
          // Check if user exists and password matches
            if ($user && $password === $user['password']) {
                // Password is correct; set session data
                session()->set('user_name', $user['name']);
                return redirect()->to('homepage'); 
            } else {
                // User not found or password is incorrect
                $validation = \Config\Services::validation();
                $validation->setError('login', 'Email or password is incorrect.');
    
                return view('pages/login', [
                    'validation' => $validation
                ]);
            }
        }
    
        // If not a post request, just display the login form
        return view('pages/login');
    }

    public function logout() {
        // Access the session service
        $session = \Config\Services::session();
    
        // Destroy the session
        $session->destroy();
    
        // Redirect to the login page
        return redirect()->to('/login'); 
    }}
