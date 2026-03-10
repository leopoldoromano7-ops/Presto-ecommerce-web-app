<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnounceController;

// rotte per gli annunci
Route::get('/', [AnnounceController::class,"home"])->name("homepage");
Route::get("/announces/index",[AnnounceController::class,"index"])->name("announces_index");
Route::get("/announces/create",[AnnounceController::class,"create"])->name("announces_create");
Route::get("/announces/show/{announce}",[AnnounceController::class,"show"])->name("announces_show");
Route::get("/category/show/{category}",[AnnounceController::class,"category_show"])->name("category_show");

// Ricerca annunci
Route::get('/search/announce', [PublicController::class, 'searchAnnounce'])->name('announce_search');

// Chi siamo
Route::get('/chi-siamo',[PublicController::class, 'aboutUs'])->name('about_us');

// rotte revisors
Route::middleware(["auth", "isRevisor"])->group(function () {
    Route::get("/revisors/index", [RevisorController::class, "revisors_index"])->name("revisors_index");
    Route::patch("/accept/{announce}", [RevisorController::class, "accept"])->name("accept");
    Route::patch("/reject/{announce}", [RevisorController::class, "reject"])->name("reject");
    Route::patch("/back/{announce}", [RevisorController::class, "back"])->name("back_announce");
});

// rotta mail
Route::middleware("auth")->group(function () {
    Route::get("/mail/becomeRevised", [RevisorController::class, "formRevisor"])->name("formRevisor");
    Route::post("/revisor/request", [RevisorController::class, "becomeRevisor"])->name("become.revisor");
});

Route::match(["get", "post"], "/make/revisor/{user}", [RevisorController::class, "makeRevisor"])
    ->middleware("signed")
    ->name("make.revisor");

// rotte lingue 
Route::post("/lingua/{lang}",[PublicController::class,"setLenguage"])->name("setFlags");
