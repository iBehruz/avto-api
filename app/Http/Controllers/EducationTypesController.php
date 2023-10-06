<?php

namespace App\Http\Controllers;

use App\Models\EducationTypes;
use Illuminate\Http\Request;

class EducationTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(EducationTypes::all(), "Success .");
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
    public function show(EducationTypes $educationTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EducationTypes $educationTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EducationTypes $educationTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EducationTypes $educationTypes)
    {
        //
    }
}
