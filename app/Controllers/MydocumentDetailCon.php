<?php

namespace App\Controllers;

class MydocumentDetailCon extends BaseController{
    public function my_document_detail()
    {
        $data = [
            'title' => 'my_document_detail',
            'url1' => "window.location.href = " . "'" . base_url('home') . "'",
            'header' => 'my_document_detail',
        ];
        echo view('template/header1', $data);
        echo view('pages/my_document_detail', $data);
    }
}
