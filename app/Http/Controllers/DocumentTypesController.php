<?php

namespace App\Http\Controllers;

use App\Models\DocumentTypes;
use Illuminate\Http\Request;

class DocumentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(DocumentTypes::all(), "Success .");
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
    public function show(DocumentTypes $documentTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentTypes $documentTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentTypes $documentTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentTypes $documentTypes)
    {
        //
    }
}
