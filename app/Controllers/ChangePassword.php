<?php

namespace App\Controllers;

class ChangePassword extends BaseController
{
    public function changePasswordView()
    {
        $data = [
            'title' => 'Change Password',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Change Password'
        ];
        return view('pages/change_password', $data);
    }
}
