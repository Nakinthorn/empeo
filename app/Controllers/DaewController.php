<?php
namespace App\Controllers;
use App\Controllers\BaseController;
class DaewController extends BaseController{
    public function daewView()
    {   
        if ($this->request->getMethod() === 'post') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $errors = [];
            
            // Validate email
            if (empty($email)) {
                $errors[] = 'Email is required';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Invalid email format';
            }
            
            // Validate password
            if (empty($password)) {
                $errors[] = 'Password is required';
            } else if (strlen($password) < 8) {
                $errors[] = 'Password must be at least 8 characters long';
            }
            
            if (!empty($errors)) {
                // If there are errors, display them
                foreach ($errors as $error) {
                    echo '<div>' . $error . '</div>';
                }
            } else {
                // If there are no errors, do something
                // For example, save to a database or redirect to another page
            }
        }
        echo view('pages/daew');
    }
}
