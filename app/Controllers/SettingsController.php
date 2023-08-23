<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SettingsController extends BaseController {
    public function viewsSetting() {
        $data = [
            'title' => 'Settings',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Settings',
        ];
        echo view('template/header2',$data); 
        echo view('pages/settings', $data);
    }
}
