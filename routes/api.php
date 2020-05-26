<?php

// Auth Endpoints
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/user', 'AuthController@user');
Route::get('/logout', 'AuthController@logout');

// Units endpoint
Route::apiResource('units', 'UnitsController'); 
Route::apiResource('products', 'ProductController'); 
Route::apiResource('vendors', 'VendorController'); 
