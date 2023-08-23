<?php

namespace App\Controllers;

class EditCompany extends BaseController
{
    public function editCompanyView()
    {
        $data = [
            'title' => 'Edit Company',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Edit Company'
        ];
        return view('pages/update_company', $data);
    }
}
