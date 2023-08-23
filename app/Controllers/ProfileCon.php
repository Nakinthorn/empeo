<?php

namespace App\Controllers;
use App\Models\UserModel;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use DateTime;

class ProfileCon extends BaseController
{

    // public function profile()
    // {
    //     $client = new Client();
    //     $session = session();
    //     try {
    //         $response = $client->request('POST', 'http://localhost:3333/mobile/unpack', [
    //             // $response = $client->request('POST', 'http://94.237.73.38:3333/mobile/unpack', [
    //             'headers' => [
    //                 'Accept' => '*/*',
    //                 'Content-Type' => 'application/json',
    //             ],
    //             'json' => [
    //                 'token' => $session->get('token')
    //             ]
    //         ]);
    //         $responseBody = $response->getBody()->getContents();
    //         $responseData = json_decode($responseBody, true);
    //         if ($responseData['msg'] === 'success') {
    //             $employee_data = $responseData['employee_data'];
    //             $dateString = $employee_data['date_of_birth'];
    //             $head = $responseData['head'];
    //             $team = $responseData['team'];
    //             $hire_date = $employee_data['hire_date'];
    //             $my_email = $employee_data['my_email'];
    //             $direct_report =  isset($responseData['employee_data']['direct_report']) ? $responseData['employee_data']['direct_report'] : '';
    //             $direct_report =  isset($responseData['employee_data']['direct_report']) ? $responseData['employee_data']['direct_report'] : '-';
    //             $date = DateTime::createFromFormat('Y-m-d', $dateString);
    //             $direct_report = implode(' ', $direct_report);
    //             $formattedDate = $date->format('d/m/Y');
    //             $currentDate = new DateTime();
    //             $birthDateString = $dateString;
    //             $birthDate = DateTime::createFromFormat('Y-m-d', $birthDateString);
    //             $age = $birthDate->diff($currentDate)->y;
    //         } else {
    //             // Handle the case where "msg" key is not present in the response data
    //             echo "Response Message not found";
    //         }
    //     } catch (RequestException $e) {
    //         echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
    //     }
    //     $given_date = $hire_date; // YYYY-MM-DD format
    //     $current_date = date('Y-m-d'); // Get the current date in YYYY-MM-DD format
    //     $diff = date_diff(date_create($given_date), date_create($current_date));
    //     $years = $diff->y;
    //     $months = $diff->m;
    //     $days = $diff->d;
    //     $duration_str = "$years" . "y" . "$months" . "m" . "$days" . "d"; // Output: 1y6m6d
    //     $hire_date_text = date('d/m/Y', strtotime($given_date)) . " ($duration_str)";
    //     $data = [
    //         'title' => 'Profile',
    //         'url1' => "window.location.href = " . "'" . base_url('home') . "'",
    //         'header' => 'Profile',
    //         'employee_data' => $employee_data,
    //         'birth_day' => $formattedDate,
    //         'age' => $age,
    //         'head' => $head,
    //         'team' => $team,
    //         'direct_report' => $direct_report != "" ? $direct_report : '-',
    //         'hire_date' => isset($hire_date_text) ? $hire_date_text : '-',
    //         'my_email' => $my_email
    //     ];
    //     // echo "xxxx=>".$direct_report;
    //     echo view('template/header_profile', $data);
    //     echo view('pages/profile', $data);
    // }
    public function profilev2()
    {
        session();
        $given_date = '2000-01-02'; // YYYY-MM-DD format
        $current_date = date('Y-m-d'); // Get the current date in YYYY-MM-DD format
        $diff = date_diff(date_create($given_date), date_create($current_date));
        $years = $diff->y;
        $months = $diff->m;
        $days = $diff->d;
        $duration_str = "$years" . "y" . "$months" . "m" . "$days" . "d"; // Output: 1y6m6d
        $hire_date_text = date('d/m/Y', strtotime($given_date)) . " ($duration_str)";
        $data = [
            'title' => 'Profile',
            'url1' => "window.location.href = " . "'" . base_url('home') . "'",
            'header' => 'Profile',
            'employee_data' => '',
            'birth_day' => '',
            'age' => '',
            'direct_report' => '',
            'hire_date' => '',
            'my_email' => '',
            'obj_detail' => '',
            'company' => '',
            'team' => ''
        ];
        echo view('template/header_profile', $data);
        echo view('pages/profilev2', $data);
    }


    public function profile_by_id()
    {
        $id = $this->request->getGet('id'); // Retrieve the 'id' parameter from the URL
        // echo 'ID Parameter: ' . $id; // Output the ID parameter
        $client = new Client();
        $session = session();
        try {
            $response = $client->request('POST', 'http://localhost:3333/mobile/unpack/em', [
                // $response = $client->request('POST', 'http://94.237.73.38:3333/mobile/unpack', [
                'headers' => [
                    'Accept' => '*/*',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'token' => $session->get('token'),
                    'id' => $id
                ]
            ]);

            // $response->getBody(); // Output the response body
            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);
            if ($responseData['msg'] === 'success') {
                // $employee_data = $responseData['employee_data'];
                // $dateString = $employee_data['date_of_birth'];
                // $head = $responseData['head'];
                // $team = $responseData['team'];
                // $hire_date = $employee_data['hire_date'];
                // $my_email = $employee_data['my_email'];
                // $direct_report =  isset($responseData['employee_data']['direct_report']) ? $responseData['employee_data']['direct_report'] : '';
                // $direct_report =  isset($responseData['employee_data']['direct_report']) ? $responseData['employee_data']['direct_report'] : '-';
                // $direct_report = implode(' ', $direct_report);
                // $date = DateTime::createFromFormat('Y-m-d', $dateString);
                // $formattedDate = $date->format('d/m/Y');
                // $currentDate = new DateTime();
                // $birthDateString = $dateString;
                // $birthDate = DateTime::createFromFormat('Y-m-d', $birthDateString);
                // $age = $birthDate->diff($currentDate)->y;
            } else {
                // Handle the case where "msg" key is not present in the response data
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
        $given_date = '2000-12-01'; // YYYY-MM-DD format
        $current_date = date('Y-m-d'); // Get the current date in YYYY-MM-DD format
        $diff = date_diff(date_create($given_date), date_create($current_date));
        $years = $diff->y;
        $months = $diff->m;
        $days = $diff->d;
        $duration_str = "$years" . "y" . "$months" . "m" . "$days" . "d"; // Output: 1y6m6d
        $hire_date_text = date('d/m/Y', strtotime($given_date)) . " ($duration_str)";
        $data = [
            'title' => 'Profile',
            'url1' => "window.location.href = " . "'" . base_url('home') . "'",
            'header' => 'Profile',
            'employee_data' => '',
            'birth_day' => '2000-12-01',
            'age' => '',
            'head' => '',
            'team' => '',
            'direct_report' => '-',
            'hire_date' =>'-',
            'my_email' => 'email'
        ];
        echo view('template/header_profile', $data);
        echo view('pages/profile', $data);
    }
    public function profile_by_idv2()
    {
        $id = $this->request->getGet('id'); // Retrieve the 'id' parameter from the URL
        // echo 'ID Parameter: ' . $id; // Output the ID parameter
        $client = new Client();
        $session = session();
        try {
            $response = $client->request('POST', 'http://localhost:3333/mobile/unpack/em', [
                // $response = $client->request('POST', 'http://94.237.73.38:3333/mobile/unpack', [
                'headers' => [
                    'Accept' => '*/*',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'token' => $session->get('token'),
                    'id' => $id
                ]
            ]);

            // $response->getBody(); // Output the response body
            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);
            if ($responseData['msg'] === 'success') {
                $employee_data = $responseData['employee_data'];
                $team = $responseData['team'];
                $obj_detail = $employee_data['obj_detail'];
                $company =  $responseData['company'];
                $dateString = $employee_data['date_of_birth'];
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
            'title' => 'Profile',
            'url1' => "window.location.href = " . "'" . base_url('home') . "'",
            'header' => 'Profile',
            'employee_data' => $employee_data,
            'birth_day' => $formattedDate,
            'age' => $age,
            'direct_report' => $direct_report != "" ? $direct_report : '-',
            'hire_date' => isset($hire_date_text) ? $hire_date_text : '-',
            'my_email' => $my_email,
            'obj_detail' => $obj_detail,
            'company' => $company,
            'team' => $team
        ];
        echo view('template/header_profile', $data);
        echo view('pages/profilev2', $data);
    }
    // public function users(){
    //     $userModel = new UserModel();
    //     $data['users'] = $userModel->getUsers();

    //     return view('users', $data);
    // }
}
