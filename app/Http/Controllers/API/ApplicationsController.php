<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller as Controller;
use App\Models\Applications;
use App\Models\carBill;
use App\Models\Clients;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class ApplicationsController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if( $request["id"] != null){
            $data = Applications::select(["default.clients.*", "default.applications.*"])
                ->leftJoin('default.clients', 'default.clients.id', '=', 'default.applications.client_id')
                ->find($request["id"]);
            return $this->sendResponse($data, "Success .");
        }

        $data = Applications::select(["default.clients.*", "default.applications.*"])
            ->leftJoin('default.clients', 'default.clients.id', '=', 'default.applications.client_id')
            ->get();
        return $this->sendResponse($data, "Success .");
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

        $clients = new Clients();
        $applications = new Applications();
        $carBill = new CarBill();

        $request->validate([
            "name" => 'required|string',
            "passport_number" => 'required|string',
            "birth_date" => 'required|string',
        ]);

        if(Clients::where("passport_number", $request["passport_number"])->first() != null){
            return $this->sendError("Client exists", [], 403);
        }

        DB::transaction(function() use ($carBill, $applications, $clients, $request) {


            $clients->fill($request->only($clients->getFillable()));

            $apiData = [
                "status" => true,
                "queryld" => "1001",
                "pinpp" => "51011026610034",
                "document" => "AC0233312",
                "surnamelatin" => "ILHOMOV",
                "namelatin" => "BEHRO‘Z",
                "patronymlatin" => "BAHODIR O‘G‘LI",
                "engsurname" => "ILKHOMOV",
                "engname" => "BEKHRUZ",
                "birthDate" => "2002-11-10",
                "birthplace" => "PISKENT TUMANI",
                "birthplaceid" => "",
                "birthcountry" => "УЗБЕКИСТАН",
                "birthcountryid" => "182",
                "livestatus" => "1",
                "nationality" => "УЗБЕК/УЗБЕЧКА",
                "nationalityid" => "44",
                "citizenship" => "УЗБЕКИСТАН",
                "citizenshipid" => "182",
                "sex" => "1",
                "docgiveplace" => "АЛМАЗАРСКИЙ РУВД ГОРОДА ТАШКЕНТА",
                "docgiveplaceid" => "26401",
                "docdatebegin" => "2018-11-30",
                "docdateend" => "2028-11-29"
            ];

            $apiData2 = [
                "permanentRegistration" => [
                "registrationDate" => "2018-07-02T00:00:00",
                  "cadastre" => "10:08:04:03:02:5017:0001:032",
                  "country" => [
                    "id" => 182,
                    "value" => "ЎЗБЕКИСТОН",
                    "idValue" => "(182) ЎЗБЕКИСТОН"
                  ],
                  "region" => [
                    "id" => 10,
                    "value" => "ТОШКЕНТ ШАҲРИ",
                    "idValue" => "(10) ТОШКЕНТ ШАҲРИ"
                  ],
                  "district" => [
                    "id" => 1012,
                    "value" => "ОЛМАЗОР ТУМАНИ",
                    "idValue" => "(1012) ОЛМАЗОР ТУМАНИ"
                  ],
                  "address" => "ИСТИКБОЛ МФЙ, ҚОРА-ҚАМИШ 2/1 ДАХАСИ,  uy:18 xonadon:32"
                ],
                "temproaryRegistrations" => null
            ];

            $clients->setAttribute("name", $apiData["surnamelatin"] . " " . $apiData["namelatin"] . " ". $apiData["patronymlatin"]);
            $clients->setAttribute("birth_date", $apiData["birthDate"]);
            $clients->setAttribute("pinfl", $apiData["pinpp"]);
            $clients->setAttribute("first_name", $apiData["namelatin"]);
            $clients->setAttribute("last_name", $apiData["surnamelatin"]);
            $clients->setAttribute("middle_name", $apiData["patronymlatin"]);
            $clients->setAttribute("passport_issued_by", $apiData["docgiveplace"]);
            $clients->setAttribute("passport_issued_at", $apiData["docdatebegin"]);
            $clients->setAttribute("passport_valid_date", $apiData["docdateend"]);
            $clients->setAttribute("residence_address", $apiData2["permanentRegistration"]["address"]);
            $clients->save();

            $request->validate([
                "phone" => 'required|string',
                "otp" => 'required|string'
            ]);

            $applications->fill($request->only($applications->getFillable()));
            $applications->setAttribute("client_id", $clients["id"]);
            $applications->setAttribute("status", 1);

            $applications->save();

            $request->validate([
                "credit_amount" => 'required|string'
            ]);

            $carBill->fill($request->only($carBill->getFillable()));
            $carBill->setAttribute("application_id", $applications['id']);
            $carBill->save();
        });

        return $this->sendResponse(array_merge( $carBill->toArray(), $clients->toArray(), $applications->toArray()), "Success .");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $applications =  Applications::where("id", $id)->first();
        $applications->fill($request->only($applications->getFillable()));
        $applications->save();
        return $this->sendResponse($applications, "Success .");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
