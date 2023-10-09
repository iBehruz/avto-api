<?php

namespace App\Http\Controllers;

use App\Models\ApiAddress;
use App\Models\ApiDatedoc;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use function PHPUnit\Framework\throwException;

class ApiDatedocController extends Controller
{
    private static $token = "eyJ4NXQiOiJNell4TW1Ga09HWXdNV0kwWldObU5EY3hOR1l3WW1NNFpUQTNNV0kyTkRBelpHUXpOR00wWkdSbE5qSmtPREZrWkRSaU9URmtNV0ZoTXpVMlpHVmxOZyIsImtpZCI6Ik16WXhNbUZrT0dZd01XSTBaV05tTkRjeE5HWXdZbU00WlRBM01XSTJOREF6WkdRek5HTTBaR1JsTmpKa09ERmtaRFJpT1RGa01XRmhNelUyWkdWbE5nX1JTMjU2IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiJpdC1iaWxpbWxhciIsImF1dCI6IkFQUExJQ0FUSU9OX1VTRVIiLCJhdWQiOiJXVUU5UjF2dnRIcjBFU21MTG13dUhuOEc5UGNhIiwibmJmIjoxNjk2ODQ5MzkxLCJhenAiOiJXVUU5UjF2dnRIcjBFU21MTG13dUhuOEc5UGNhIiwic2NvcGUiOiJkZWZhdWx0IiwiaXNzIjoiaHR0cHM6XC9cL3JtcC1kZS5lZ292LnV6Ojk0NDNcL29hdXRoMlwvdG9rZW4iLCJleHAiOjE2OTY4NTI5OTEsImlhdCI6MTY5Njg0OTM5MSwianRpIjoiYmZjNGUxZDctYmNmNy00NzMzLWI3ODktZTA0ZGFjOGZlZmNmIn0.drlrc4dXuqJY1Kf_HImrSP3kJoowC6gCTPKvlPuNhOaWqHCHgQwOq2ZkkjgF-7V6Lu-QOg71uI5trNk7dowAET73tDIa7gF2AUVWOP98UKCDnOl-wybAq-ENjlpaOLRmM1q-GIP-zCudcsSNuTWw4eqRYT8RkJgdKk6nlGS0fRbJ4Qkvu9CalOPMHzmsLYkHsojjmv651WvVFaKsNeZPijp-HDd4XqKDD7oRZRlamO10rWK_hfVoB5zH-wXZjecNCCUcGE5jJHOYrEoRke4NJ4h_axQiE02LfMmGF2PU5UPsJdaFzqotsxJS2LYBvGTgFD757iitOmCiDiTIaOZ6Uw";

    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $datedoc = ApiDatedoc::where("document", $request["document"])->where("birth_date", $request["birth_date"])->first();
        if($datedoc == null){

            $response = self::getDateDoc(self::$token, $request["document"], $request["birth_date"]);

            if(!json_decode($response["body"], true)["status"]){
                return $this->sendError("Api Error");
            }


            $datedoc = new ApiDatedoc();
            $datedoc->setAttribute("document", $request["document"]);
            $datedoc->setAttribute("birth_date", $request["birth_date"]);
            $datedoc->setAttribute("body", json_decode($response["body"]));
            $datedoc->save();
            $pinpp = json_decode($response["body"], true)["pinpp"];
            $response = self::getAddress(self::$token, $pinpp);
            $address = new ApiAddress();
            $address->setAttribute("pinpp", $pinpp);
            $address->setAttribute("body",  json_decode($response["body"], true)["data"]);
            $address->save();
        }

        return $this->sendResponse($datedoc, "Success .");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ApiDatedoc $apiDatedoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApiDatedoc $apiDatedoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApiDatedoc $apiDatedoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiDatedoc $apiDatedoc)
    {
        //
    }

    public function getToken()
    {
        $client = new Client();
        $params = [
            'query' => [
                'client_id' => 'WUE9R1vvtHr0ESmLLmwuHn8G9Pca',
                'secret' => 'fNcJMhZwxWbw3R_IVa07yGQmN8Ea',
                'username' => 'it-bilimlar',
                'password' => 'sI3sttAAFI9nKChGsqSC'
            ]
        ];

        $result = $client->request('GET', 'http://172.16.150.121:6043/token', $params);

        return ["status"=> $result->getStatusCode(), "body" => $result->getBody()];
    }

    public function getDateDoc($token, $document, $birthDate){
        $client = new Client();
        $params = [
            'query' => [
                'queryId' => '23',
                'document' => $document,
                'birthDate' => $birthDate
            ],
            'headers' => ['Authorization' => 'Bearer '.$token],
        ];
        $result = $client->request('GET', 'http://172.16.150.121:6044/datedoc', $params);
        return ["status"=> $result->getStatusCode(), "body" => $result->getBody()->getContents()];
    }
    public function getAddress($token, $pinpp){
        $client = new Client();
        $params = [
            'query' => [
                'pinpp' => $pinpp
            ],
            'headers' => ['Authorization' => 'Bearer '.$token],
        ];
        $result = $client->request('GET', 'http://172.16.150.121:6045/address', $params);

        return ["status"=> $result->getStatusCode(), "body" => $result->getBody()->getContents()];
    }

}
