<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Hash;
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

Route::middleware('auth:sanctum')->get('/user', function () {
    return User::all();;
});

// Route::get('login', 'Auth\LoginController')->name('login');


Route::post('/login', function (Request $request) {
    // $data = $request->validate([
    //     'email' => 'required|email',
    //     'password' => 'required'
    // ]);
   $user= User::where('email', $request->email)->first();
// print_r($data);
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response([
            'message' => ['These credentials do not match our records.']
        ], 404);
    }

     $token = $user->createToken('my-app-token')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token
    ];

     return response($response, 201);
});
