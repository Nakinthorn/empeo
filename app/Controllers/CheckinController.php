<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CheckinController extends BaseController
{
    public function checkin() {
        $data = [
            'title' => 'Check In',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Check In',
        ];
        echo view('template/header1',$data); 
        echo view('pages/checkin');
    }
    public function do_checkin() {
        $token = $this->request->getPost('token');
        $userlat = $this->request->getPost('userlat');
        $userlng = $this->request->getPost('userlng');
        $img_in = $this->request->getPost('img_in');

        $client = new Client();
        try {
            $response = $client->request('POST', 'http://localhost:3333/mobile/checkIn',[
                'headers' => [
                    'Accept' => '*/*',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'token' => $token,
                    'userLat' => $userlat,
                    'userLng' => $userlng,
                    'img_in' => $img_in
                ]
            ]);

            echo $token;
            
            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);

            if ($responseData['message'] === "success") {
                    $token = $responseData['token'];
                    $userlat = $responseData['userLat'];
                    $userlng = $responseData['userLng'];
                    $img_in = $responseData['img_in'];
                    $session = session();
                    $session->set([
                        'token' => $token,
                        'userLat' => $userlat,
                        'userLng' => $userlng,
                        'img_in' => $img_in
                    ]);
                    $data = [
                        'token' => $token
                    ];
            }
            return view('pages/checkin', $data);
        } catch (RequestException $e) {
            echo "Guzzle Error: " . $e->getMessage();
        }
    }
}
