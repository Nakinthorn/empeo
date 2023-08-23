<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class LoginFirstController extends BaseController {
    public function loginFirstView() {
        echo view('pages/loginFirst');
    }
    public function loginFirst() {
        $newPassword = $this->request->getPost('newPassword');
        $newPasswordConfirm = $this->request->getPost('newPasswordConfirm');
        
        if (!empty($newPassword) && !empty($newPasswordConfirm)) {
            $client = new Client();
            try {
                $session = session();
                $response = $client->request('POST', 'http://localhost:3333/mobile/login/first',[
                    'headers' => [
                        'Accept' => '*/*',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'token' => $session->get('token'),
                        'newPassword' => $newPassword,
                        'newPasswordConfirm' => $newPasswordConfirm,
                        'email' => $session->get('email')
                    ]
                ]);

                $responseBody = $response->getBody()->getContents();
                $responseData = json_decode($responseBody, true);
                
                if ($responseData['msg'] === "success") {
                    return redirect()->to('/home');
                } else {
                    echo "Response Message not found";
                }
            } catch (RequestException $e) {
                echo "Guzzle Error: " . $e->getMessage();
            }
        } else {
            return redirect()->to('/loginFirst')->withInput()->with('error', 'Invalid password');
            // echo "bomb";        
        }
    }
}
