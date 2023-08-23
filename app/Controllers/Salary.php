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
            'title' => 'Income Deduction',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Income Deduction'
        ];
        return view('pages/income_deduction', $data);
    }

    public function payInstallmentView()
    {
        $data = [
            'title' => 'Pay Installment',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Pay Installment'
        ];
        return view('pages/pay_installment', $data);
    }

    public function employmentTypeView()
    {
        $data = [
            'title' => 'Employment Type',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Employment Type'
        ];
        return view('pages/employment_type', $data);
    }
}
