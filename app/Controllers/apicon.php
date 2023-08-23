<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use GuzzleHttp\Client;

class apicon extends Controller
{
    public function index()
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        // create a new Guzzle client instance
        $client = new Client(['verify' => false ]);

        // make an API call
        $response = $client->get('https://uat.maxmart.store:4040/api/test');

        // get the response data
        $data = $response->getBody()->getContents();

        echo $data;

        // return the data to the view
        // return view('my_view', ['data' => $data]);
    }
}


?>