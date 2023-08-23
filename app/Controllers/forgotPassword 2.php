<?php

namespace App\Controllers;

class ForgotPassword extends BaseController
{
    public function forgotPasswordView()
    {
        $data = [
            'title' => 'Forgot Password',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Forgot Password'
        ];
        return view('pages/forgot_password', $data);
    }
}
