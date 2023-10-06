<?php

namespace App\Http\Controllers;

use App\Models\EmploymentTypes;
use App\Models\ProfessionTypes;
use Illuminate\Http\Request;

class EmploymentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(EmploymentTypes::all(), "Success .");
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
    public function show(EmploymentTypes $employmentTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmploymentTypes $employmentTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmploymentTypes $employmentTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmploymentTypes $employmentTypes)
    {
        //
    }
}
