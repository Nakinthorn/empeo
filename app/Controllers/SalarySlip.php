<?php

namespace App\Controllers;

class SalarySlip extends BaseController
{
    public function salarySlipView()
    {
        $data = [
            'title' => 'Salary Slip',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'SalarySlip'
        ];
        return view('pages/salary_slip', $data);
    }
}
