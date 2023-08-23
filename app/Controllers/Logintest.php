<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Logintest extends BaseController
{
    public function index()
    {
        // Load the login view
        return view('pages/logintest');
    }
    public function login()
    {
        // Get email and password from POST data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        // echo $email;
        // echo $password;
        // Mock data for user credentials

        // Check if email and password match mock data
        if (!empty($email) && !empty($password)) {

            $client = new Client();

            try {
                $response = $client->request('POST', 'http://localhost:3333/mobile/login', [
                // $response = $client->request('POST', 'http://94.237.73.38:3333/mobile/login', [
                    'headers' => [
                        'Accept' => '*/*',
                        'Content-Type' => 'application/json',
                        'User-Agent' => 'Thunder Client (https://www.thunderclient.com)'
                    ],
                    'json' => [
                        'email' => $email,
                        'password' => $password
                    ]
                ]);

                // $response->getBody(); // Output the response body
                $responseBody = $response->getBody()->getContents();
                $responseData = json_decode($responseBody, true);

                if ($responseData['msg'] === "success") {
                    $msg = $responseData['msg'];
                    $token = $responseData['token'];
                    $role = $responseData['role'];
                    $status = $responseData['status'];
                    $email_res = $responseData['email'];
                    // Use the $msg variable as needed
                    // echo "Response Message: " . $token;
                    // Set user data in session
                    $session = session();
                    $session->set([
                        // 'token' => null,
                        'token' => $token,
                        'role' => $role,
                        'status' => $status,
                        'email' => $email_res
                    ]);
                    return redirect()->to('/home');
                } else {
                    // return redirect()->to('/login/test');
                    // Handle the case where "msg" key is not present in the response data
                    echo "Response Message not found";
                }
            } catch (RequestException $e) {
                echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
                return redirect()->to('/login/test');
            }

            // Redirect to dashboard or any other page
        } else {
            // Redirect back to login page with error message
            return redirect()->to('pages/logintest')->withInput()->with('error', 'Invalid email or password');
        }
    }

    public function logout()
    {
        // Destroy the session and logout
        $session = session();
        $session->destroy();
        return redirect()->to('pages/logintest');
    }
}
