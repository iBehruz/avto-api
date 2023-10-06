<?php

namespace App\Http\Controllers;

use App\Models\JobInforamtions;
use Illuminate\Http\Request;

class JobInforamtionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = JobInforamtions::where("application_id", $request["application_id"])->first();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $job_informations = new JobInforamtions();
      $job_informations->fill($request->only($job_informations->getFillable()));
      $job_informations->save();
      return $this->sendResponse($job_informations, "Success .");
    }

    /**
     * Display the specified resource.
     */
    public function show(JobInforamtions $jobInforamtions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobInforamtions $jobInforamtions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobInforamtions $jobInforamtions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobInforamtions $jobInforamtions)
    {
        //
    }
}
