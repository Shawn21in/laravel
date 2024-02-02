<?php

use App\Http\Controllers\Admin\Prize\PrizeController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Qa\QaController;
use App\Models\Admin\Prize\Prize;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {return view('welcome');});
Route::get("/",[QaController::class, "index"]);

Route::group(["prefix" => "admin/qa"], function(){
Route::get("/",[QaController::class, "list"]);
Route::get("list",[QaController::class, "list"]);
Route::get("add",[QaController::class, "add"]);
//Admin\Qa\QaController.php
//在瀏覽器打上http://127.0.0.1:8000/admin/qa/add
// get後方第一個""內是網址,只的是我網址輸入/admin/qa/list會執行,右邊QaController::class這隻程式的,的"add"這個方法
Route::post("insert",[QaController::class, "insert"]);
Route::get("edit/{Id?}",[QaController::class, "edit"]);
//edit/{Id},{}內是代表參數,參數名稱為Id,參數後面加上問號edit/{Id?}代表可能也可能沒有
//這個
Route::post("update",[QaController::class, "update"]);
Route::get("delete/{Id}",[QaController::class, "delete"]);

});

// Route::get("/admin/qa/list",[QaController::class, "list"]);
// Route::get("/admin/qa/add",[QaController::class, "add"]);
// Route::post("/admin/qa/insert",[QaController::class, "insert"]);
// Route::get("/admin/qa/edit/{Id?}",[QaController::class, "edit"]);
// Route::post("/admin/qa/update",[QaController::class, "update"]);
// Route::get("/admin/qa/delete/{Id}",[QaController::class, "delete"]);


Route::group(["prefix" => "admin/prize"], function(){
    Route::get("/",[PrizeController::class, "list"]);
    Route::get("list",[PrizeController::class, "list"]);
    Route::get("add",[PrizeController::class, "add"]);
    //Admin\Qa\QaController.php
    //在瀏覽器打上http://127.0.0.1:8000/admin/prize/add
    // get後方第一個""內是網址,只的是我網址輸入/admin/qa/list會執行,右邊QaController::class這隻程式的,的"add"這個方法
    Route::post("insert",[PrizeController::class, "insert"]);
    Route::get("edit/{Id?}",[PrizeController::class, "edit"]);
    Route::post("update",[PrizeController::class, "update"]);
    Route::get("delete/{Id}",[PrizeController::class, "delete"]);
    });

Route::group(["prefix" => "admin/product"],function(){
    Route::get("/",[ProductController::class, "list"]);
    Route::get("list",[ProductController::class, "list"]);
    Route::get("add",[ProductController::class,"add"]);
    //在瀏覽器打上http://127.0.0.1:8000/admin/product/add
    Route::post("insert",[ProductController::class,"insert"]);
    Route::get("edit/{prId?}",[ProductController::class, "edit"]);
    Route::post("update",[ProductController::class, "update"]);
    Route::get("delete/{prId}",[ProductController::class, "delete"]);
});