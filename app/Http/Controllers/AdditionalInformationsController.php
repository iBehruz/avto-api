<?php

namespace App\Http\Controllers;

use App\Models\AdditionalInformations;
use Illuminate\Http\Request;

class AdditionalInformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = AdditionalInformations::where("application_id", $request["application_id"])->first();
        if($data == null){
            return $this->sendResponse(["employment"=>1, "profession"=>1], "Not Exits .");
        }
        return $this->sendResponse($data, "Success .");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $additional_informations = new AdditionalInformations();
        $additional_informations->fill($request->only($additional_informations->getFillable()));
        $additional_informations->save();
        return $this->sendResponse($additional_informations, "Success .");
    }

    /**
     * Display the specified resource.
     */
    public function show(AdditionalInformations $additionalInformations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdditionalInformations $additionalInformations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdditionalInformations $additionalInformations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdditionalInformations $additionalInformations)
    {
        //
    }
}
