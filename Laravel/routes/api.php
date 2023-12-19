<?php

use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::get('/teachers', function (Response $response) {
    header('Content-Type: application/json');
    $page = request('page') ?? 1;
    $teachers = Teacher::paginate(30, ['*'], 'page', $page);
    return json_encode($teachers);
});