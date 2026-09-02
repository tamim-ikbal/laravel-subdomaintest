<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

//Subdomain routes
Route::domain(config('app.tenant_domain'))->group(function () {
    Route::get('/', function (Request $request) {
        dd(['Tenant domain route works!',$request]);
    });
    Route::get('/products', function (Request $request) {
        dd(['Tenant domain products route works!',$request]);
    });
    Route::get('/products/{id}', function (Request $request, $id) {
        dd(['Tenant domain products route works!',$request, 'Product ID:' => $id]);
    });
});