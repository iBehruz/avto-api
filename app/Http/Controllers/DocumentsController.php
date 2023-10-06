<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request["application_id"]){
            $documents = Documents::where("application_id", $request["application_id"])->first();
            if($documents == null){
                return $this->sendResponse(["type" => 1, "files" => []], "Not exists .", 422);
            }
            return $this->sendResponse($documents, "Success .");
        }else{
            $documents = Documents::all();
            return $this->sendResponse($documents, "Success .");
        }
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
        $documents = new Documents();
        $documents->fill($request->only($documents->getFillable()));
        $documents->save();
        return $this->sendResponse($documents, "Success .");
    }

    /**
     * Display the specified resource.
     */
    public function show(Documents $documents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documents $documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documents $documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documents $documents)
    {
        $documents->delete();
        return $this->sendResponse("", "Success .");
    }
}
