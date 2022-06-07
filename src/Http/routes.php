<?php

use ll\llenv\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::resource('dcat-env', Controllers\EnvManagerController::class);
