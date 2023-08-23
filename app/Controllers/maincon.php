<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class maincon extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function tony()
    {
        return view('viewstest01');
    }
    public function dom2()
    {
        return view('dom');
    }

    public function daew01()
    {
        return view('./daew/daew');
    }
    public function doc1()
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
                    $imgprofile = isset($employee_data['img_profile']) ? $employee_data['img_profile'] : '' ;

                    $timein = $responseData['time_in'];
                    $timeout = $responseData['time_out'];


                    $time = date("H:i:s", time());
                    $hours = (int)explode(':', $time)[0];
                    $minuit = (int)explode(':', $time)[1];
                    $workprogress = '';
                } else {
                    // Handle the case where "msg" key is not present in the response data
                    echo "Response Message not found";
                }
            } catch (RequestException $e) {
                echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
            }
            $data = [
                'title' => 'Document',
                'url1' => "window.location.href = " . "'" . base_url() . "'",
                'header' => 'Document',
                'tony'  => 'tony is handsome',
                'token'  => $session->get('token'),

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


                'timein' => $timein,
                'timeout' => $timeout,

                'leave_vacation' =>isset($employee_data['annual_vacation_leave_count']) ? $employee_data['annual_vacation_leave_count'] : 0,
                'leave_vacation_max' => isset($employee_data['annual_vacation_leave_max']) ? $employee_data['annual_vacation_leave_max'] : 1,
                'leave_sick' =>isset($employee_data['sick_count']) ? $employee_data['sick_count'] : 0,
                'leave_sick_max' => isset($employee_data['sick_max']) ? $employee_data['sick_max'] : 1,

                'leave_business' =>  isset($employee_data['business_leave_count']) ? $employee_data['business_leave_count'] : 0,
                'leave_business_max' =>  isset($employee_data['business_leave_max']) ? $employee_data['business_leave_max'] : 1,

                'leave_maternity' => isset($employee_data['maternity_leave_count']) ? $employee_data['maternity_leave_count'] : 0,
                'leave_maternity_max' =>  isset($employee_data['maternity_leave_max']) ? $employee_data['maternity_leave_max'] : 1,



                'deaw'  => 'deaw is not handsome'
            ];
            // echo  $head;
            echo view('template/header1', $data);
            echo view('pages/document.php', $data);
        }
    }

    public function leavereq($page = 'home')
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
                    $head = $responseData['head'];
                    $team = $responseData['team'];
                    $imgprofile = isset($employee_data['img_profile']) ? $employee_data['img_profile'] : '' ;

                    $timein = $responseData['time_in'];
                    $timeout = $responseData['time_out'];


                    $time = date("H:i:s", time());
                    $hours = (int)explode(':', $time)[0];
                    $minuit = (int)explode(':', $time)[1];
                    $workprogress = '';
                } else {
                    // Handle the case where "msg" key is not present in the response data
                    echo "Response Message not found";
                }
            } catch (RequestException $e) {
                echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
            }
            $data = [
                'title' => 'Leave',
                'url1' => "window.location.href = " . "'" . base_url() . "'",
                'header' => 'Leave Request',
                'tony'  => 'tony is handsome',
                'token'  => $session->get('token'),

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

                'leave_vacation' =>isset($employee_data['annual_vacation_leave_count']) ? $employee_data['annual_vacation_leave_count'] : 0,
                'leave_vacation_max' => isset($employee_data['annual_vacation_leave_max']) ? $employee_data['annual_vacation_leave_max'] : 1,
                'leave_sick' =>isset($employee_data['sick_count']) ? $employee_data['sick_count'] : 0,
                'leave_sick_max' => isset($employee_data['sick_max']) ? $employee_data['sick_max'] : 1,

                'leave_business' =>  isset($employee_data['business_leave_count']) ? $employee_data['business_leave_count'] : 0,
                'leave_business_max' =>  isset($employee_data['business_leave_max']) ? $employee_data['business_leave_max'] : 1,

                'leave_maternity' => isset($employee_data['maternity_leave_count']) ? $employee_data['maternity_leave_count'] : 0,
                'leave_maternity_max' =>  isset($employee_data['maternity_leave_max']) ? $employee_data['maternity_leave_max'] : 1,




                'deaw'  => 'deaw is not handsome'
            ];
            // echo  $head;
            echo view('template/header1', $data);
            echo view('pages/leavereq', $data);
        }
    }


    public function offsite($page)
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
                    $name =isset($employee_data['fname']) ? $employee_data['fname'] : '-';
                    $head = $responseData['head'];
                    
                    $team = $responseData['team'];
                    $imgprofile = isset($employee_data['img_profile']) ? $employee_data['img_profile'] : '' ;

                    $timein = $responseData['time_in'];
                    $timeout = $responseData['time_out'];


                    $time = date("H:i:s", time());
                    $hours = (int)explode(':', $time)[0];
                    $minuit = (int)explode(':', $time)[1];
                    $workprogress = '';
                } else {
                    // Handle the case where "msg" key is not present in the response data
                    echo "Response Message not found";
                }
            } catch (RequestException $e) {
                echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
            }
            $data = [
                'title' => 'Leave',
                'url1' => "window.location.href = " . "'" . base_url() . "'",
                'header' => 'Offsite Request',
                'tony'  => 'tony is handsome',
                'token'  => $session->get('token'),
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
                'timein' => $timein,
                'timeout' => $timeout,
                'leave_vacation' =>isset($employee_data['annual_vacation_leave_count']) ? $employee_data['annual_vacation_leave_count'] : 0,
                'leave_vacation_max' => isset($employee_data['annual_vacation_leave_max']) ? $employee_data['annual_vacation_leave_max'] : 1,
                'leave_sick' =>isset($employee_data['sick_count']) ? $employee_data['sick_count'] : 0,
                'leave_sick_max' => isset($employee_data['sick_max']) ? $employee_data['sick_max'] : 1,

                'leave_business' =>  isset($employee_data['business_leave_count']) ? $employee_data['business_leave_count'] : 0,
                'leave_business_max' =>  isset($employee_data['business_leave_max']) ? $employee_data['business_leave_max'] : 1,

                'leave_maternity' => isset($employee_data['maternity_leave_count']) ? $employee_data['maternity_leave_count'] : 0,
                'leave_maternity_max' =>  isset($employee_data['maternity_leave_max']) ? $employee_data['maternity_leave_max'] : 1,
            ];
            // echo  $head;
            echo view('template/header1', $data);
            echo view('pages/offsitereq', $data);
        }
    }
    public function ot($page)
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
                    $head = $responseData['head'];
                    $team = $responseData['team'];
                    $imgprofile = isset($employee_data['img_profile']) ? $employee_data['img_profile'] : '' ;
                    $timein = $responseData['time_in'];
                    $timeout = $responseData['time_out'];
                    $time = date("H:i:s", time());
                    $hours = (int)explode(':', $time)[0];
                    $minuit = (int)explode(':', $time)[1];
                    $workprogress = '';
                } else {
                    // Handle the case where "msg" key is not present in the response data
                    echo "Response Message not found";
                }
            } catch (RequestException $e) {
                echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
            }
            $data = [
                'title' => 'Leave',
                'url1' => "window.location.href = " . "'" . base_url() . "'",
                'header' => 'Overtime',
                'token'  => $session->get('token'),
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
                'timein' => $timein,
                'timeout' => $timeout,
                'leave_vacation' =>isset($employee_data['annual_vacation_leave_count']) ? $employee_data['annual_vacation_leave_count'] : 0,
                'leave_vacation_max' => isset($employee_data['annual_vacation_leave_max']) ? $employee_data['annual_vacation_leave_max'] : 1,
                'leave_sick' =>isset($employee_data['sick_count']) ? $employee_data['sick_count'] : 0,
                'leave_sick_max' => isset($employee_data['sick_max']) ? $employee_data['sick_max'] : 1,

                'leave_business' =>  isset($employee_data['business_leave_count']) ? $employee_data['business_leave_count'] : 0,
                'leave_business_max' =>  isset($employee_data['business_leave_max']) ? $employee_data['business_leave_max'] : 1,

                'leave_maternity' => isset($employee_data['maternity_leave_count']) ? $employee_data['maternity_leave_count'] : 0,
                'leave_maternity_max' =>  isset($employee_data['maternity_leave_max']) ? $employee_data['maternity_leave_max'] : 1,
            ];
            // echo  $head;
            echo view('template/header1', $data);
            echo view('pages/ot', $data);
        }
    }


    public function calendar()
    {
        $data = [
            'title' => 'Carlendar',
            'url1' => "window.location.href = " . "'" . base_url('home') . "'",
            'header' => 'Carlendar',
            'tony'  => 'tony is handsome',
            'deaw'  => 'deaw is not handsome'
        ];
        echo view('template/header1', $data);
        echo view('../Views/pages/calendar.php');
        echo view('template/footer', $data);
    }



    public function addemp()
    {
        $client = new Client();
        $session = session();
        if (!$session->get('token')) {
            return redirect()->to('/login');
        } else {
            $session = session();
        try {
            $response = $client->request('POST', 'http://localhost:3333/mobile/auth/admin', [
                'headers' => [
                    'Accept' => '*/*',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'token' => $session->get('token')
                ]
            ]);

            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);
            if ($responseData['msg'] === 'good') {
                $data = [
                    'title' => 'Add Employee',
                    'url1' => "window.location.href = '" . base_url('menu/admin') . "'",
                    'header' => 'Add Employee'
                ];
                echo view('template/header1', $data);
                echo view('pages/addemp');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
        }
    }
}
