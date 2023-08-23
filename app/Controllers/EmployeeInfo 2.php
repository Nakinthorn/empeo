<?php

namespace App\Controllers;

class EmployeeInfo extends BaseController
{
    public function employeeInfoView()
    {
        $data = [
            'title' => 'Employee Info',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Employee Info'
        ];
        return view('pages/employee_info', $data);
    }
}
