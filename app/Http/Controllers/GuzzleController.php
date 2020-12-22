<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GuzzleController extends Controller
{
    // public function getRemoteData()
    // {
    //     $client = new Client([
    //         'headers' => ['content-type' =>'application/json', 'Accept' => 'application/json' ],
    //     ]);


    //     $response = $client->request('GET', 'http://apig8.toedu.me/api/Integrations/Transcript?contestID=04845905-5072-6564-8204-096404114208&fbclid=IwAR0wwySDGmfvcWNBpn_NE5tcNIRbc5nBkUwqWHPyiv3e0w8iv81u8EhM1kU', [
    //             'code' => '714b320c-1046-4e37-a3c3-20bc6fcac014',
    //         ]);
    //     $data = $response->getBody();
    //     $data = json_decode($data);
    //     dd($data);
    //     return $data
    // }

    public function getRemoteData() {


        return view('admin.subject.update_score_online');
    }

}
