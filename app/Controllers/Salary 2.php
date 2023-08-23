<?php

namespace App\Controllers;

class Salary extends BaseController
{
    public function salaryView()
    {
        $data = [
            'title' => 'Salary',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Salary'
        ];
        return view('pages/salary', $data);
    }

    public function incomeDeductionView()
    {
        $data = [
            'title' => 'Salary',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Salary'
        ];
        return view('pages/income_deduction', $data);
    }
}
