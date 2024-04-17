<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DateController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\PlanificationController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\EventServiceController;

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

Route::get('/customers',[CustomerController::class, 'list']);
Route::get('/customers/{id}',[CustomerController::class, 'item']);
Route::post('/customers',[CustomerController::class,'store']);
Route::put('/customers/{id}',[CustomerController::class,'update']);
Route::delete('/customers/{id}',[CustomerController::class,'destroy']);

Route::get('/locations',[LocationController::class, 'list']);
Route::get('/locations/{id}',[LocationController::class, 'item']);
Route::post('/locations',[LocationController::class,'store']);
Route::put('/locations/{id}',[LocationController::class,'update']);
Route::delete('/locations/{id}',[LocationController::class,'destroy']);

Route::get('/services',[ServiceController::class, 'list']);
Route::get('/services/{id}',[ServiceController::class, 'item']);
Route::post('/services',[ServiceController::class,'store']);
Route::put('/services/{id}',[ServiceController::class,'update']);
Route::delete('/services/{id}',[ServiceController::class,'destroy']);

Route::get('/companies',[CompanyController::class, 'list']);
Route::get('/companies/{id}',[CompanyController::class, 'item']);
Route::post('/companies',[CompanyController::class,'store']);
Route::put('/companies/{id}',[CompanyController::class,'update']);
Route::delete('/companies/{id}',[CompanyController::class,'destroy']);

Route::post('/login/',[AuthController::class,'login']);
Route::post('/register/',[AuthController::class,'register']);

Route::get('/dates',[DateController::class, 'list']);
Route::get('/dates/{id}',[DateController::class, 'item']);
Route::post('/dates',[DateController::class,'store']);
Route::put('/dates/{id}',[DateController::class,'update']);
Route::delete('/dates/{id}',[DateController::class,'destroy']);

Route::get('/events/search', [EventController::class, 'search']);
Route::get('/events',[EventController::class, 'list']);
Route::get('/events/{id}',[EventController::class, 'item']);
Route::post('/events',[EventController::class,'store']);
Route::put('/events/{id}',[EventController::class,'update']);
Route::delete('/events/{id}',[EventController::class,'destroy']);

Route::get('/payments',[PaymentController::class, 'list']);
Route::get('/payments/{id}',[PaymentController::class, 'item']);
Route::post('/payments',[PaymentController::class,'store']);
Route::put('/payments/{id}',[PaymentController::class,'update']);
Route::delete('/payments/{id}',[PaymentController::class,'destroy']);

Route::get('/planifications',[PlanificationController::class, 'list']);
Route::get('/planifications/{id}',[PlanificationController::class, 'item']);
Route::post('/planifications',[PlanificationController::class,'store']);
Route::put('/planifications/{id}',[PlanificationController::class,'update']);
Route::delete('/planifications/{id}',[PlanificationController::class,'destroy']);

Route::get('/users',[UserController::class, 'list']);
Route::get('/users/{id}',[UserController::class, 'item']);
Route::post('/users',[UserController::class,'store']);
Route::put('/users/{id}',[UserController::class,'update']);
Route::delete('/users/{id}',[UserController::class,'destroy']);

Route::post('/events/{eventId}/services', [EventServiceController::class, 'store']);
Route::get('/events/{eventId}/services', [EventServiceController::class, 'index']);
Route::delete('/events/{eventId}/services/{serviceId}', [EventServiceController::class, 'destroy']);

Route::middleware('auth:api')->get('/token', function (Request $request) {
    return $request->user()->createToken('AccessToken')->accessToken;
});


