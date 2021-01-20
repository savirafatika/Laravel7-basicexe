<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('post', 'PostController@index')->name('post.index');
Route::prefix('post')->middleware('auth')->group(function () {
    // ========================= PAGINATION WORKFLOW ==============================
    Route::get('create', 'PostController@create')->name('post.create');
    Route::post('store', 'PostController@store');
    // ============================ UPDATE DATA ===================================
    Route::get('{post:slug}/edit', 'PostController@edit');
    Route::patch('{post:slug}/edit', 'PostController@update');
    // PUT = update data di seluruh fill pd database
    // PATCH = update data secara partial / sebagian fill

    // ============================ DELETE DATA ===================================
    Route::delete('{post:slug}/delete', 'PostController@destroy');
});
// ============================= ROUTE WILD ==================================
Route::get('{post:slug}', 'PostController@show')->name('post.show');

// ========================== FILTER BY CATEGORY ===============================
Route::get('categories/{category:slug}', 'CategoryController@show')->name('categories.show');

// ============================= FILTER BY TAG ==================================
Route::get('tags/{tag:slug}', 'TagController@show')->name('tags.show');

// ================= PASSING DATA DARI REQUEST DAN CONTROLLER=================
// data request dr URL
// Route::get('/', function () {
//     $name = request('name');
//     return view('home', ['name' => $name]);
// });
// data request dr controller
// Route::get('/', 'HomesController@index');
// Route::get('/', 'HomeController');

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
