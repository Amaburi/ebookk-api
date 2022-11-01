<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\cobasatu;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\bookcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('nama',function(){
//     return["me" => "Jy"];
// });
// Route::get('siswaregis', function () {
//     return view('siswaregis');
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('siswa/add',[siswacontroller::class,'store']);
Route::get('siswa/show',[siswacontroller::class,'index']);
Route::put('siswa/{id}/update',[siswacontroller::class,'update']);
Route::delete('siswa/{id}/delete',[siswacontroller::class,'destroy']);

Route::post('book',[bookcontroller::class,'store']);
Route::get('book',[bookcontroller::class,'index']);
Route::put('book/{id}/update',[bookcontroller::class,'update']);
Route::delete('book/{id}/delete',[bookcontroller::class,'destroy']);

// Route::get('cobasatu', [cobasatu::class, 'index']);
Route::resource('cobasatu', cobasatu::class);
Route::resource('siswacontroller', siswacontroller::class);


Route::middleware('auth:sanctum')->group(function(){
    Route::resource('book',bookcontroller::class)->except('create','edit','show','index');
    Route::post('/logout',[AuthController::class,'logout']);
});