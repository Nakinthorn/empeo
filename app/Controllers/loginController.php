<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use CodeIgniter\HTTP\Response;

class LoginController extends BaseController {
    public function loginView() {
        echo view('pages/login');
    }
    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        if (!empty($email) && !empty($password)) {
            $client = new Client();
            $errorMessage = '';
            try {
                $response = $client->request('POST', 'http://localhost:3333/mobile/login', [
                    'headers' => [
                        'Accept' => '*/*',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'email' => $email,
                        'password' => $password
                    ]
                ]);
    
                $responseBody = $response->getBody()->getContents();
                $responseData = json_decode($responseBody, true);
    
                if ($responseData['msg'] === "success") {
                    $msg = $responseData['msg'];
                    $token = $responseData['token'];
                    $role = $responseData['role'];
                    $status = $responseData['status'];
                    $email_res = $responseData['email'];
                    $session = session();
                    $session->set([
                        'token' => $token,
                        'role' => $role,
                        'status' => $status,
                        'email' => $email_res
                    ]);
                    if ($status === 'first') {
                        return redirect()->to('/loginFirst2');
                    } else {
                        return redirect()->to('/home');
                    }
                }
            } catch (ClientException $e) {
                $responseBody = $e->getResponse()->getBody()->getContents();
                $responseData = json_decode($responseBody, true);

                if ($responseData['msg'] === "wrong_password") {
                    $data = [
                        'error' => 'Invalid email or password'
                    ];
                    return view('pages/login', $data);

                } elseif ($responseData['msg'] === "wrong_email") {
                    $data = [
                        'error' => 'Invalid email or password'
                    ];
                    return view('pages/login', $data);
                }
            }
        } else {
            return redirect()->to('pages/login2')->withInput()->with('error', 'Invalid email or password');
        }
    }
    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('pages/login');
    }
}





