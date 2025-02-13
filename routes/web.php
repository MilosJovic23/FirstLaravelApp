<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index',[
        "name" => "Milos"
    ]);
});
Route::get('/hello', function () {
    return "hello";
})->name('hello');

Route::get('/hallo', function () {
    return redirect()->route('hello');
});
Route::get('/greet/{name}', function ($name) {
    return "Hello $name"."!";
});
Route::fallback(function () {
    return "Still got somewhere";
});
