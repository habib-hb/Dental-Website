<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});








Route::get('/services/root_canal_treatment', function () {
    return view('services.root_canal_treatment');
});











Route::get('/details/root_canal_treatment', function () {
    return view('details.details_root_canal_treatment_root');
});
