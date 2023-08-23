<?php

namespace App\Controllers;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use DateTime;


class ChangeShiftsCon extends BaseController
{
    public function change_shifts()
    {
        $client = new Client();
        $session = session();
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
                $dateString = $employee_data['date_of_birth'];
                $head = $responseData['head'];
                $team = $responseData['team'];
                $hire_date = $employee_data['hire_date'];
                $my_email = $employee_data['my_email'];
                $direct_report =  isset($responseData['employee_data']['direct_report']) ? $responseData['employee_data']['direct_report'] : '';
                $direct_report =  isset($responseData['employee_data']['direct_report']) ? $responseData['employee_data']['direct_report'] : '-';
                $date = DateTime::createFromFormat('Y-m-d', $dateString);
                $direct_report = implode(' ', $direct_report);
                $formattedDate = $date->format('d/m/Y');
                $currentDate = new DateTime();
                $birthDateString = $dateString;
                $birthDate = DateTime::createFromFormat('Y-m-d', $birthDateString);
                $age = $birthDate->diff($currentDate)->y;
            } else {
                // Handle the case where "msg" key is not present in the response data
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
        $given_date = $hire_date; // YYYY-MM-DD format
        $current_date = date('Y-m-d'); // Get the current date in YYYY-MM-DD format
        $diff = date_diff(date_create($given_date), date_create($current_date));
        $years = $diff->y;
        $months = $diff->m;
        $days = $diff->d;
        $duration_str = "$years" . "y" . "$months" . "m" . "$days" . "d"; // Output: 1y6m6d
        $hire_date_text = date('d/m/Y', strtotime($given_date)) . " ($duration_str)";
        $data = [
            'title' => 'Change shifts',
            'url1' => "window.location.href = " . "'" . base_url('home') . "'",
            'header' => 'Change shifts',
            'employee_data' => $employee_data,
            'birth_day' => $formattedDate,
            'age' => $age,
            'head' => $head,
            'team' => $team,
            'direct_report' => $direct_report != "" ? $direct_report : '-',
            'hire_date' => isset($hire_date_text) ? $hire_date_text : '-',
            'my_email' => $my_email
        ];
        echo view('template/header1', $data);
        echo view('pages/change_shift', $data);
        // echo view('pages/template_modal',$data);
        
    }
    public function change_shifts_user2(){
        $user1 = $this->request->getGet('userone_id');
        $user2 = $this->request->getGet('usertwo_id');
        $id = $this->request->getGet('id');
        $status_approve = $this->request->getGet('status_approve');
        $reason = $this->request->getGet('reason');
        $client = new Client();
        $session = session();
        $user1 = intval($user1);
        $user2 = intval($user2);
        $id = intval($id);
        try {
            $response = $client->request('POST', 'http://localhost:3333/mobile/get/shift/byid', [
                // $response = $client->request('POST', 'http://94.237.73.38:3333/mobile/unpack', [
                'headers' => [
                    'Accept' => '*/*',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'token' => $session->get('token'),
                    "user1" =>  $user1,
                    "user2" =>  $user2
                ]
            ]);

            // $response->getBody(); // Output the response body
            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);
            if ($responseData['msg'] === 'good') {
                $profile1 = $responseData['profile1'][0];
                $profile2 = $responseData['profile2'][0];
               
            } else {
                // Handle the case where "msg" key is not present in the response data
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
        $data = [
            'title' => 'Change shifts',
            'url1' => "window.location.href = " . "'" . base_url('home') . "'",
            'header' => 'Change shifts',
            'profile1' => $profile1,
            'profile2' => $profile2,
            'id' => $id,
            'reason' => $reason,
            'status_approve' => $status_approve
        ];
        echo view('template/header1', $data);
        echo view('pages/change_shift_user2', $data );
        // echo view('pages/template_modal',$data);
    }

    public function change_shifts_admin(){
        $user1 = $this->request->getGet('userone_id');
        $user2 = $this->request->getGet('usertwo_id');
        $id = $this->request->getGet('id');
        $status_approve = $this->request->getGet('status_approve');
        $reason = $this->request->getGet('reason');
        $client = new Client();
        $session = session();
        $user1 = intval($user1);
        $user2 = intval($user2);
        $id = intval($id);
        try {
            $response = $client->request('POST', 'http://localhost:3333/mobile/get/shift/byid', [
                // $response = $client->request('POST', 'http://94.237.73.38:3333/mobile/unpack', [
                'headers' => [
                    'Accept' => '*/*',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'token' => $session->get('token'),
                    "user1" =>  $user1,
                    "user2" =>  $user2
                ]
            ]);

            // $response->getBody(); // Output the response body
            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);
            if ($responseData['msg'] === 'good') {
                $profile1 = $responseData['profile1'][0];
                $profile2 = $responseData['profile2'][0];
               
            } else {
                // Handle the case where "msg" key is not present in the response data
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
        $data = [
            'title' => 'Change shifts',
            'url1' => "window.location.href = " . "'" . base_url('home') . "'",
            'header' => 'Change shifts',
            'profile1' => $profile1,
            'profile2' => $profile2,
            'id' => $id,
            'reason' => $reason,
            'status_approve' => $status_approve
        ];
        echo view('template/header1', $data);
        echo view('pages/change_shift_user_admin', $data );
    }
    

}
