<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

date_default_timezone_set('Asia/Bangkok');


class Homecon extends BaseController
{

    public function calendar() {

        $client = new Client();
        $session = session();
        $token = $session->get('token');
        if (!$session->get('token')) {
            return redirect()->to('/login');
        } else {
            $name = '';
            try {
                $response = $client->request('POST', 'http://localhost:3333/mobile/unpack', [
                    'headers' => [
                        'Accept' => '*/*',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'token' => $session->get('token')
                    ]
                ]);
            } catch (RequestException $e) {
                echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
            }
            $data = [
                'title' => 'Calendar',
                'url1' => "window.location.href = " . "'" . base_url() . "'",
                'token' => $token,

            ];
            echo view('pages/calendar', $data);
        }
    }

    public function home()
    {

        $client = new Client();
        $session = session();
        if (!$session->get('token')) {
            return redirect()->to('/login');
        } else {
            try {
                $response = $client->request('POST', 'http://localhost:3333/mobile/unpack', [
                    // $response = $client->request('POST', 'http://94.237.73.38:3333/mobile/unpack', [
                    'headers' => [
                        'Accept' => '*/*',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'token' => $session->get('token')
                    ]
                ]);

                // $response->getBody(); // Output the response body
                $responseBody = $response->getBody()->getContents();
                $responseData = json_decode($responseBody, true);
                if ($responseData['msg'] === 'success') {
                    $employee_data = $responseData['employee_data'];
                    $name = isset($employee_data['fname']) ? $employee_data['fname'] : '-';
                    $imgprofile =  isset($employee_data['img_profile']) ? $employee_data['img_profile'] : base_url('imgs/Mask1.svg');
                    $session->set(['profile' => $imgprofile]);
                    $timein = $responseData['time_in'];
                    $timeout = $responseData['time_out'];


                    $time = date("H:i:s", time());
                    $hours = (int)explode(':', $time)[0];
                    $minuit = (int)explode(':', $time)[1];
                } else {
                    // Handle the case where "msg" key is not present in the response data
                    echo "Response Message not found";
                }
            } catch (RequestException $e) {
                echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
            }
            $data = [
                'title' => 'Home',
                'url1' => "window.location.href = " . "'" . base_url() . "'",
                'header' => 'Home',
                'tony'  => 'tony is handsome',
                'name' => $name,
                'imgprofile' => $imgprofile,
                'time' => $time . " .   wf :" . $hours . $minuit,
                'gotoprofile' => "window.location.href = " . "'" . base_url("profile") . "'",
                'gotoleave' => "window.location.href = " . "'" . base_url("leave") . "'",
                'gotooffsite' => "window.location.href = " . "'" . base_url("offsite") . "'",
                'gotoot' => "window.location.href = " . "'" . base_url("ot") . "'",
                'gotodoc' => "window.location.href = " . "'" . base_url("document") . "'",
                'gotoedit_profile' => "window.location.href = " . "'" . base_url("edit_profile") . "'",
                'gotocalendar' => "window.location.href = " . "'" . base_url("calendar") . "'",
                'gototeam' => "window.location.href = " . "'" . base_url("choose_people") . "'",
                'gotochangeshift' => "window.location.href = " . "'" . base_url("change_shift") . "'",


                'timein' => $timein,
                'timeout' => $timeout,
                'leave_vacation' => isset($employee_data['annual_vacation_leave_count']) ? $employee_data['annual_vacation_leave_count'] : 10,
                'leave_vacation_max' => isset($employee_data['annual_vacation_leave_max']) ? $employee_data['annual_vacation_leave_max'] : 0,
                'leave_sick' => isset($employee_data['sick_count']) ? $employee_data['sick_count'] : 0,
                'leave_sick_max' => isset($employee_data['sick_max']) ? $employee_data['sick_max'] : 10,

                'leave_business' =>  isset($employee_data['business_leave_count']) ? $employee_data['business_leave_count'] : 10,
                'leave_business_max' =>  isset($employee_data['business_leave_max']) ? $employee_data['business_leave_max'] : 10,

                'leave_maternity' => isset($employee_data['maternity_leave_count']) ? $employee_data['maternity_leave_count'] : 10,
                'leave_maternity_max' =>  isset($employee_data['maternity_leave_max']) ? $employee_data['maternity_leave_max'] : 10,
            ];
            // echo  $head;
            echo view('pages/home', $data);
            echo view('template/footer_menu', $data);
        }
    }

    public function logout()
    {

        $session = session();
        session_destroy();

        return redirect()->to('/home');
    }
}
