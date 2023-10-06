<?php

namespace App\Http\Controllers;

use App\Models\ApplicationStatuses;
use Illuminate\Http\Request;

class ApplicationStatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(ApplicationStatuses::all(), "Success .");
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
    public function show(ApplicationStatuses $applicationStatuses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplicationStatuses $applicationStatuses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApplicationStatuses $applicationStatuses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicationStatuses $applicationStatuses)
    {
        //
    }
}
