<?php

use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\ComentarioController;
use App\Http\Controllers\API\NoticiaController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SugerenciaQuejaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Mockery\Generator\StringManipulation\Pass\Pass;

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

Route::post('tokens/create', function (Request $request) {
    $request->validate([
       'email' => 'required|email',
       'password' => 'required'
   ]);

   $user = User::where('email', $request->email)->first();

   if (! $user || ! Hash::check($request->password, $user->password)) {
       throw ValidationException::withMessages([
           'email' => ['Las credenciales son incorrectas'],
       ]);
   }
   return response()->json([
       'token_type' => 'Bearer',
       'access_token' => $user->createToken('token_name')->plainTextToken, // token name you can choose for your self or leave blank if you like to
       'name' => $user->name,
       'id' => $user->id,
       'Admin' => $user->admin
   ])->header("Accept","application/json")->header('Content-Type', 'application/json',);
})->name('login');

Route::apiResource('noticias', NoticiaController::class);

Route::apiResource('usuarios', UserController::class);

Route::apiResource('SugerenciaQueja', SugerenciaQuejaController::class);

Route::apiResource('blog', BlogController::class);

Route::middleware('auth:sanctum')->apiResource('comentarios', ComentarioController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
