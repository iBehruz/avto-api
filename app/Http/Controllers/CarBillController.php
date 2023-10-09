<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\carBill;
use Illuminate\Http\Request;

class CarBillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = CarBill::where("application_id", $request["application_id"])->first();
        if($data == null){
            return $this->sendResponse(["month"=>6], "Not Exists .");
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(carBill $car_bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(carBill $car_bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, carBill $car_bill)
    {
        $carBill = $car_bill;
        $carBill->fill($request->only($carBill->getFillable()));
        $carBill->save();
        return $this->sendResponse($carBill, "Success .");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(carBill $car_bill)
    {
        //
    }
}
