<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
