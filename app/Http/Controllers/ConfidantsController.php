<?php

namespace App\Http\Controllers;

use App\Models\Confidants;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ConfidantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Confidants::where("application_id", $request["application_id"])->get();

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
        $confidant = new Confidants();
        $confidant->fill($request->only($confidant->getFillable()));
        $confidant->save();
        return $this->sendResponse($confidant, "Success .");
    }

    /**
     * Display the specified resource.
     */
    public function show(Confidants $confidants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Confidants $confidants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Confidants $confidants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Confidants $confidants)
    {
        //
    }
}
