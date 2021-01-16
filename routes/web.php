<?php

use Illuminate\Support\Facades\Route;

// ========================= PAGINATION WORKFLOW ==============================
Route::get('post', 'PostController@index');
Route::get('post/create', 'PostController@create');
Route::post('post/store', 'PostController@store');

// ============================ UPDATE DATA ===================================
Route::get('post/{post:slug}/edit', 'PostController@edit');
Route::patch('post/{post:slug}/edit', 'PostController@update');
// PUT = update data di seluruh fill pd database
// PATCH = update data secara partial / sebagian fill

// ============================= ROUTE WILD ==================================
Route::get('post/{post:slug}', 'PostController@show');

// ================= PASSING DATA DARI REQUEST DAN CONTROLLER=================
// data request dr URL
// Route::get('/', function () {
//     $name = request('name');
//     return view('home', ['name' => $name]);
// });
// data request dr controller
// Route::get('/', 'HomesController@index');
Route::get('/', 'HomeController');

// ============================ BLADE ========================================
// Route::get('/', function () {
//     return view('home');
// });
Route::view('contact', 'contact');
Route::view('about', 'about');
Route::view('login', 'login');

// ============================ ROUTING VIEW =================================
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/', 'welcome');
// Route::view('contact', 'contact');
Route::view('series/show', 'series.show');
Route::view('series/premium/create', 'series.premium.create');

Route::get('cetak', function () {
    $postBody = "Lorem ipsum, or lipsum as it is sometimes known,
    is dummy text used in laying out print, graphic or web designs.
    The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.";
    return view('cetak', ['body' => $postBody]);
});
