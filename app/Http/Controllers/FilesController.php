<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request["id"] != null) {
            $file = Files::where("id", $request["id"])->first();
            return $this->sendResponse($file, "Success .");
        }

        $file = Files::get();
            return $this->sendResponse($file, "Success .");
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
        $upload_path = public_path('storage');
        $file_name = $request->file->getClientOriginalName();
        $generated_new_name = time() . '.' . $request->file->getClientOriginalExtension();

        $_file = $request->file->move($upload_path, $generated_new_name);

        $file = new Files();
        $file->setAttribute("url", asset('storage/'.$generated_new_name));
        $file->setAttribute("name", $file_name);
        $file->setAttribute("size", $_file->getSize());
        $file->setAttribute("type", $request->file->getClientOriginalExtension());
        $file->save();

        return $this->sendResponse($file, "Success .");
    }

    /**
     * Display the specified resource.
     */
    public function show(Files $files)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Files $files)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Files $files)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Files $files, $id)
    {
        if(Files::where("id", $id)->first() != null) {
            $files->where("id", $id)->delete();
        }else{
            return $this->sendError("Not found");
        }
        return $this->sendResponse("$id deleted", "Success .");
    }
}
