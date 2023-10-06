<?php

use App\Http\Controllers\AdditionalInformationsController;
use App\Http\Controllers\API\ApplicationsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ApplicationStatusesController;
use App\Http\Controllers\ApplicationTypesController;
use App\Http\Controllers\CarBillController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ConfidantsController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\DocumentTypesController;
use App\Http\Controllers\EducationTypesController;
use App\Http\Controllers\EmploymentTypesController;
use App\Http\Controllers\FamilyStatusesController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\JobInforamtionsController;
use App\Http\Controllers\ProfessionTypesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function (Request $request){
    return response(["data"=> "test"]);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',   [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {

    Route::resource('clients', ClientsController::class);
    Route::resource('applications', ApplicationsController::class);
    Route::resource('documents', DocumentsController::class);
    Route::resource('job-informations', JobInforamtionsController::class);
    Route::resource('additional-information', AdditionalInformationsController::class);
    Route::resource('cards', CardsController::class);
    Route::resource('car', CarController::class);
    Route::resource('files', FilesController::class);

    Route::resource('confidants', ConfidantsController::class);
    Route::resource('cards', CardsController::class);

    Route::resource('car-bill', CarBillController::class);

    Route::get('applications/{id}', 'ApplicationsController@index');

    Route::resource('document-types', DocumentTypesController::class);

    Route::resource('employment-types', EmploymentTypesController::class);
    Route::resource('profession-types', ProfessionTypesController::class);
    Route::resource('education-types', EducationTypesController::class);
    Route::resource('family-statuses', FamilyStatusesController::class);

    Route::resource('application_types', ApplicationTypesController::class);
    Route::resource('application_statuses', ApplicationStatusesController::class);
});


