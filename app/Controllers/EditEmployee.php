<?php

namespace App\Controllers;

class EditEmployee extends BaseController
{
    public function editEmployeeView()
    {
        $data = [
            'title' => 'Edit Employee',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Edit Employee'
        ];
        return view('pages/edit_employee', $data);
    }
}
