<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;

Route::get('/', [mainController::class, 'index'])->name('sortById');

Route::post('/', [mainController::class, 'submitForm']);

Route::get('/addNew', [mainController::class, 'addNew']);

Route::get('/item/{id}/update', [mainController::class, 'updateItem'])->name('item-update');

Route::post('/item/{id}/update', [mainController::class, 'updateItemSubmit'])->name('item-update-submit');

Route::get('/del/{id}', [mainController::class, 'deleteItem'])->name('delete-item');

Route::get('/search', [mainController::class, 'siteSearch'])->name('site-search');

Route::get('/sortedByName', [mainController::class, 'sortByName'])->name('sortByName');

Route::get('/sortedBySurname', [mainController::class, 'sortBySurname'])->name('sortBySurname');