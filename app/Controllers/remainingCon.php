<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class remainingCon extends BaseController
{
    public function remaining()
    {


        $client = new Client();
        $session = session();
        $leaveCount = '';
        try {
            $response = $client->request('POST', 'http://localhost:3333/mobile/leave-day', [
                // $response = $client->request('POST', 'http://94.237.73.38:3333/mobile/login', [
                'headers' => [
                    'Accept' => '*/*',
                    'Content-Type' => 'application/json',
                    'User-Agent' => 'Thunder Client (https://www.thunderclient.com)'
                ],
                'json' => [
                    'token' => $session->get('token')
                ]
            ]);

            // $response->getBody(); // Output the response body
            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);
            $leaveCount = $responseData['leave_day'];

            // if ($responseData['msg'] === "success") {
            //     echo 'api success';
            // } else {
            //     echo 'api bomb';
            // }
        } catch (RequestException $e) {
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
            // return redirect()->to('/login/test');
        }

        $data = [
            'title' => 'Remaining leave',
            'url1' => "window.location.href = " . "'" . base_url('edit_profile') . "'",
            'header' => 'Remaining leave',
            'leaveCount' => $leaveCount,
            'leave' => "window.location.href = " . "'" . base_url("leave") ."'",


        ];

        echo view('template/header1', $data);
        echo view('pages/remaining_leave',$data);
    }
}
