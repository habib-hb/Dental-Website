<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});








Route::get('/services/root_canal_treatment', function () {
    return view('services.root_canal_treatment');
});











Route::get('/services/cosmetic_dentist', function () {
    return view('services.cosmetic_dentist');
});










Route::get('/services/dental_implants', function () {
    return view('services.dental_implants');
});









Route::get('/services/teeth_whitening', function () {
    return view('services.teeth_whitening');
});









Route::get('/services/emergency_dentistry', function () {
    return view('services.emergency_dentistry');
});










Route::get('/details/root_canal_treatment', function () {
    return view('details.details_root_canal_treatment_root');
});
