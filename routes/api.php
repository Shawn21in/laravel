<?php

use App\Http\Controllers\Front\FrontPrizeController;
use App\Http\Controllers\Front\FrontProductController;
use App\Http\Controllers\Front\FrontQaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get("/qa/list",[FrontQaController::class, "list"]);
Route::get("/prize/list",[FrontPrizeController::class, "getlist"]);
Route::get("/product/list",[FrontProductController::class, "getlist"]);
