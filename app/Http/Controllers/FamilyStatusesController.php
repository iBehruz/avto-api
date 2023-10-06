<?php

namespace App\Http\Controllers;

use App\Models\FamilyStatuses;
use Illuminate\Http\Request;

class FamilyStatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(FamilyStatuses::all(), "Success .");
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
    public function show(FamilyStatuses $familyStatuses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FamilyStatuses $familyStatuses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FamilyStatuses $familyStatuses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FamilyStatuses $familyStatuses)
    {
        //
    }
}
