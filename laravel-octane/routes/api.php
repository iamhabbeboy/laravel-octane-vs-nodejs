<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Octane\Facades\Octane;
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

Route::get('/todo', function (Request $request) {
    try {
        $client = new GuzzleHttp\Client();
        $url = 'https://jsonplaceholder.typicode.com/todos';
        $result = $client->get($url);
        $resp = $result->getBody()->getContents();
        return response()->json(json_decode($resp));
    } catch (Exception $e) {
        return response()->json(['error' => 'error: '. $e->getMessage()]);
    }
});

// Octane::route('GET', '/external-service', function () {
//     try {
//         $client = new GuzzleHttp\Client();
//         $url = 'https://jsonplaceholder.typicode.com/todos';
//         $result = $client->get($url);
//         $resp = $result->getBody()->getContents();
//         return response()->json(json_decode($resp));
//     } catch (Exception $e) {
//         return response()->json(['error' => 'error: '. $e->getMessage()]);
//     }
// });
