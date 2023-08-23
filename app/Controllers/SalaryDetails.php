<?php

namespace App\Controllers;

class SalaryDetails extends BaseController
{
    public function salaryDetailsView()
    {
        $data = [
            'title' => 'Salary Details',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Salary Detail'
        ];
        return view('pages/salary_details', $data);
    }
}
