<?php

use App\Http\Controllers\PropertyController;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $properties = Property::take(4)->get();
    return view('index', compact('properties'));
})->name('index');

Route::get('/about', function () {
    $properties = Property::take(3)->get();
    return view('about', compact('properties'));
})->name('about');

Route::get('/properties', [PropertyController::class, 'index'])->name('properties');
Route::get('/properties/search', [PropertyController::class, 'search'])->name('properties.search');
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('property.show');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/single', function () {
    return view('single');
})->name('single');
