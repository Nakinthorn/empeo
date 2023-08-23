<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;


class adminCon extends BaseController
{
    public function menu_admin()
    {
        $client = new Client();
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
                    'title' => 'Admin menu',
                    'url1' => "window.location.href = '" . base_url('home') . "'",
                    'header' => 'Admin menu'
                ];
                echo view('pages/menu_admin');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
    }

    public function add_emp()
    {
        $client = new Client();
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
    public function add_first_emp()
    {
        $client = new Client();
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
                    'title' => 'Add First Employee in Business',
                    'url1' => "window.location.href = '" . base_url('home') . "'",
                    'header' => 'Add First Employee in Business'
                ];
                echo view('template/header1', $data);
                echo view('pages/addfirst_emp');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
    }
    public function profileById()
    {
        $client = new Client();
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
                    'title' => 'Employee',
                    'url1' => "window.location.href = '" . base_url('menu/admin') . "'",
                    'header' => 'Employee'
                ];
                echo view('template/header1', $data);
                echo view('pages/profilebyid');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
    }

    public function add_company()
    {
        $client = new Client();
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
                    'title' => 'Add Company',
                    'url1' => "window.location.href = '" . base_url('menu/admin') . "'",
                    'header' => 'Add Company'
                ];
                echo view('template/header1', $data);
                echo view('pages/add_company');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
    }
    public function add_companyv2()
    {
        $client = new Client();
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
                    'title' => 'Add Company',
                    'url1' => "window.location.href = '" . base_url('edit_company') . "'",
                    'header' => 'Add Company'
                ];
                echo view('template/header1', $data);
                echo view('pages/add_company_v2.php');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
    }

    public function edit_companyByid()
    {
        $client = new Client();
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
                    'title' => 'Edit Company',
                    'url1' => "window.location.href = '" . base_url('edit_company') . "'",
                    'header' => 'Edit Company'
                ];
                echo view('template/header1', $data);
                echo view('pages/update_company_edit.php');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
    }


    public function edit_department()
    {
        $client = new Client();
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
                    'title' => 'My Departments',
                    'url1' => "window.location.href = '" . base_url('menu/admin') . "'",
                    'header' => 'My Departments'
                ];
                echo view('template/header1', $data);
                echo view('pages/my_departments');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
    }
    public function edit_myprofile()
    {
        session();
        $data = [
            'title' => 'Edit My Profile',
            'url1' => "window.location.href =" . "'" . strval(base_url('settings')) . "'",
            'header' => 'Edit My Profile'
        ];
        echo view('template/header1', $data);
        echo view('pages/edit_myprofile');
    }
    public function edit_company()
    {
        $client = new Client();
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
                    'title' => 'My Company',
                    'url1' => "window.location.href = '" . base_url('menu/admin') . "'",
                    'header' => 'My Company'
                ];
                echo view('template/header1', $data);
                echo view('pages/edit_company');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
    }
    public function edit_employeeByAdmin()
    {
        $client = new Client();
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
                    'title' => 'My Employee',
                    'url1' => "window.location.href = '" . base_url('menu/admin') . "'",
                    'header' => 'My Employee'
                ];
                echo view('template/header1', $data);
                echo view('pages/employee_editbyadmin');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
    }
    public function Permission()
    {
        $client = new Client();
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
                    'title' => 'Permission',
                    'url1' => "window.location.href = '" . base_url('menu/admin') . "'",
                    'header' => 'Permission'
                ];
                echo view('template/header1', $data);
                echo view('pages/employee_permission');
            } else {
                return redirect()->to('/home');
                echo "Response Message not found";
            }
        } catch (RequestException $e) {
            return redirect()->to('/home');
            echo "Guzzle Error: " . $e->getMessage(); // Output any Guzzle request exception error
        }
    }

    public function AdminLoginView()
    {
        $data = [
            'title' => 'Admin Login',
            'url1' => "window.location.href = '" . base_url('home') . "'",
            'header' => 'Admin Login'
        ];

        return view('backoffice/login', $data);
    }

    public function DashboardView()
    {
        $data = [
            'title' => 'Dashboard',
            'url1' => "window.location.href = '" . base_url('home') . "'",
            'header' => 'Dashboard'
        ];
        return view('backoffice/dashboard', $data);
    }

    public function SetupView()
    {
        return view('backoffice/setup');
    }
    public function PayPeriodView()
    {
        return view('backoffice/pay-period');
    }

    public function NotFoundView()
    {
        return view('backoffice/404');
    }

    public function MasterView()
    {
        return view('backoffice/master');
    }
    public function SocialSecurityRateView()
    {
        return view('backoffice/social-security-rate');
    }
    public function AccumulateView()
    {
        return view('backoffice/accumulate');
    }

    public function ExpenseView()
    {
        return view('backoffice/expense');
    }
    public function MasterHomeView()
    {
        return view('backoffice/master-home');
    }
    public function HolidayCalendarView()
    {
        return view('backoffice/holiday-calendar');
    }
    public function TempView()
    {
        return view('backoffice/temp');
    }
}
