<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class deawlogin extends BaseController
{
    public function setSession() {
        $token = $_GET['token'];
        $status = $_GET['status'];
        // echo $token;
        $session = session();
        $session->set(['token' => $token, 'status' => $status]);
        return redirect()->to('/home');
    }

    public function checkoutMethod() {
        $data = [
            'title' => 'Check Out',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Check Out',
        ];
        echo view('template/header1',$data); 
        echo view('pages/checkout', $data);
    }
}
