<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Octane\Facades\Octane;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Octane::route('GET', '/external-service', function () {
    try {
        $client = new GuzzleHttp\Client();
        $url = 'http://localhost:3000/data';
        $result = $client->get($url);
        $resp = $result->getBody()->getContents();
        return response()->json(json_decode($resp));
    } catch (Exception $e) {
        return response()->json(['error' => 'error: '. $e->getMessage()]);
    }
});
