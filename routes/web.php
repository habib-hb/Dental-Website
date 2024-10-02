<?php

use App\Models\blog_posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});













Route::get('/consultation', function () {
    return view('consultation');
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











Route::get('/services/prevention', function () {
    return view('services.prevention');
});











Route::get('/details/root_canal_treatment', function () {
    return view('details.details_root_canal_treatment_root');
});











Route::get('/details/cosmetic_dentist', function () {
    return view('details.details_cosmetic_dentist');
});












Route::get('/details/dental_implants', function () {
    return view('details.details_dental_implants');
});











Route::get('/details/teeth_whitening', function () {
    return view('details.details_teeth_whitening');
});











Route::get('/details/emergency_dentistry', function () {
    return view('details.details_emergency_dentistry');
});











Route::get('/details/prevention', function () {
    return view('details.details_prevention');
});











Route::get('/admin_dashboard', function () {
    return view('admin_dashboard.admin_dashboard');
});













Route::get('/admin_dashboard/blogs', function () {
    return view('admin_dashboard.blogs');
});











Route::get('/admin_dashboard/banner_headline', function () {
    return view('admin_dashboard.banner_headline');
});











Route::get('/admin_dashboard/appointments', function () {
    return view('admin_dashboard.appointments');
});











Route::get('/admin_dashboard/appointments/fulfilled_appointments', function () {
    return view('admin_dashboard.fulfilled_appointments');
});












Route::get('/admin_dashboard/appointments/unfulfilled_appointments', function () {
    return view('admin_dashboard.unfulfilled_appointments');
});












Route::get('/admin_dashboard/appointments/unsettled_appointments', function () {
    return view('admin_dashboard.unsettled_appointments');
});












Route::get('/admin_dashboard/schedules_management', function () {
    return view('admin_dashboard.schedules_management');
});












Route::get('/blogs/{slug}', function ($slug) {
    $post = blog_posts::where('blog_link', '/blogs/' . $slug)->first();
    return view('dynamic_content.custom_blog', ['post' => $post]);
});












Route::get('/blog_showcase', function () {

    return view('blog_showcase');

});

