<?php
namespace App\Controllers;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use DateTime;
date_default_timezone_set('Asia/Bangkok');




class EditProfileCon extends BaseController{
    public function edit_profile()
    {

        $client = new Client();
        $session = session();
        $role = $session->get('role');
        if(!$session->get('token'))
            {
                // echo 'sfklgmskjfdgnlsjkdfgnlskdfjlsfkdjglwkjb00000000000000';
                return redirect()->to('/login');
               
            }
        else
        {
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
                    $dateString = isset($employee_data['date_of_birth']) ? $employee_data['date_of_birth'] : '1999-09-09';
                    $name = isset($employee_data['fname']) ? $employee_data['fname'] : '-';
                    $lname = isset($employee_data['lname']) ? $employee_data['lname'] : '-';
                    $jobtitle =  isset($employee_data['job_title']) ? $employee_data['job_title'] : '-';
                    $imgprofile = isset($employee_data['img_profile']) ? $employee_data['img_profile'] : base_url('imgs/Mask1.svg');
                    $date = DateTime::createFromFormat('Y-m-d', $dateString);
                    $formattedDate = $date->format('d/m/Y');
                    $currentDate = new DateTime();
                    $birthDateString = $dateString;
                    $birthDate = DateTime::createFromFormat('Y-m-d', $birthDateString);
                    $age = $birthDate->diff($currentDate)->y;
                    $timein = $responseData['time_in'];
                    $timeout = $responseData['time_out'];
                    $time =date("H:i:s", time()); 
                } else {
                    // Handle the case where "msg" key is not present in the response data
                    echo "Response Message not found";
                }
            } catch (RequestException $e) {
                echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
            }
            $data = [
                'title' => 'edit_profile',
                'url1' => "window.location.href = " . "'" . base_url() ."'",
                'header' => 'Profile',
                'tony'  => 'tony is handsome',
                'name' => $name,
                'lname' => $lname,
                'jobtitle' => $jobtitle,
                'imgprofile' => $imgprofile,
                'gotoprofile' => "window.location.href = " . "'" . base_url("profile") ."'",
                'gotoleave' => "window.location.href = " . "'" . base_url("leave") ."'",
                'gotooffsite' => "window.location.href = " . "'" . base_url("offsite") ."'",
                'gotoot' => "window.location.href = " . "'" . base_url("ot") ."'",
                'gotodoc' => "window.location.href = " . "'" . base_url("document") ."'",
                'gotoedit_profile' => "window.location.href = " . "'" . base_url("edit_profile") ."'",
                'gotocalendar' => "window.location.href = " . "'" . base_url("calendar") ."'",
                'gototeam' => "window.location.href = " . "'" . base_url("choose_people") ."'",
                'gotoleave_remain' => "window.location.href = " . "'" . base_url("remaining") ."'",
                'logout' => "window.location.href = " . "'" . base_url("logout") ."'",
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
                'role' => $role,
                'header_color' => '#E6EDFF'
            ];
            // echo $session->get('token');
            echo view('template/header2', $data);
            echo view('pages/edit_profile',$data);


        }
       
       
    }
}
