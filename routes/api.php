<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/user-create', function () {
    User::create([
        'name' => 'Mohammad Mahdi Soozandeh',
        'email' => 'blsaa@gmail.com',
        'password' => Hash::make('super'),
    ]);
});


Route::get('/login', function () {

    $credentials = request()->only(['email', 'password']);

    $token = auth()->attempt($credentials);

    return response()->json($token);
});

Route::middleware('auth')->get('/info', function () {
    return auth()->user();
});
