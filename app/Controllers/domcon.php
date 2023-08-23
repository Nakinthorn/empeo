<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class domcon extends BaseController
{
    public function dom2()
    {

        $client = new Client();
    
        try {
            $response = $client->request('POST', 'http://localhost:3333/mobile/login', [
                'headers' => [
                    'Accept' => '*/*',
                    'Content-Type' => 'application/json',
                    'User-Agent' => 'Thunder Client (https://www.thunderclient.com)'
                ],
                'json' => [
                    'email' => 'sunti.po@unit.co.th',
                    'password' => '123'
                ]
            ]);

            echo $response->getBody(); // Output the response body
            
        } catch (RequestException $e) {
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
        // $item1 = $response->getBody(); 
        $data = [
            'title' => 'Overtime',
            'url1' => "window.location.href = "."'".base_url('document')."'",
            'header'=>'Overtime',
            'tony'  =>'tony is handsome',
            'deaw'  =>'deaw is not handsome',
            'tonyjs'=> ""


        ];
        echo view('pages/model_template');
        // return view('dom');
    }
}
