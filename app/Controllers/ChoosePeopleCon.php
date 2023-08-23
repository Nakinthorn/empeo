<?php

namespace App\Controllers;

class ChoosePeopleCon extends BaseController
{
   
    public function choose_people(){
        $session = session();
        $token = $session->get('token');
        $data = [
            'title' => 'Choose People',
            'url1' => "window.location.href = "."'".base_url('home')."'",
            'header'=>'Choose People',
            "token" => $token
        ];

        echo view('template/header1',$data);
        echo view('pages/choose_people',$data);
    }
}
