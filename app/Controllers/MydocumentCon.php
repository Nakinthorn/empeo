<?php

namespace App\Controllers;

class MydocumentCon extends BaseController
{

    public function my_document()
    {
        $session = session();
        $role = $session->get('role');
        $token = $session->get('token');
        $title = "My Document"; // Added missing semicolon here
        $data = [
            'title' => $title, // Use the updated value of $title
            'url1' => "window.location.href = " . "'" . base_url('home') . "'",
            'header' => $title,
            "token" => $token
        ];


        echo view('template/header1', $data);
        echo view('pages/my_document', $data);
    }
    public function manager()
    {
        $session = session();
        $role = $session->get('role');
            $token = $session->get('token');
            $profile_img = $session->get('profile');
            $title = "Manager"; // Added missing semicolon here
            $data = [
                'title' => $title, // Use the updated value of $title
                'url1' => "window.location.href = " . "'" . base_url('home') . "'",
                'header' => $title,
                "token" => $token,
                'profile' => $profile_img
            ];
            echo view('template/header1', $data);
            echo view('pages/manager_document', $data);
            echo view('pages/model_template', $data);
    }
}
