<?php

namespace App\Controllers;

class ChangePasswordController extends BaseController {
    public function changePasswordView() {
        echo view('pages/change_password');
    }
}
