<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return response()->json(['message' => 'Unauthorized. Please log in via API.'], 401);
})->name('login');

Route::get('/', function () {
    return response()->json([
        'message' => 'Masak API is running 🚀',
        'status' => 'OK'
    ]);
});
