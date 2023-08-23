<?php

namespace App\Controllers;

class PinController extends BaseController
{
    public function pinView()
    {
        $data = [
            'title' => 'Pin',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=> 'Pin'
        ];
        return view('pages/pin', $data);
    }
}
