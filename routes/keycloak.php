<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Keycloak\ClientCredentialsController;

Route::group(["prefix" => "v1"], function () {
    Route::group(["prefix" => "credentials"], function () {
        Route::post('/login', [ClientCredentialsController::class, 'login']);
    });
});
