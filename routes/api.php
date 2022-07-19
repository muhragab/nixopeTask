<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('add/role',[RoleController::class, 'store']);
Route::post('assign/role',[RoleController::class, 'assignRole']);
Route::post('verify/email',[UserController::class, 'verifyEmail']);

Route::apiResources([
    'users' => UserController::class,
]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
