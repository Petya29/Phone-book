<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // $items = DB::table('bookItem')->get();
//     $items = App\Models\bookItem::all();   // with model
//     return view('main', compact('items'));
// });

Route::get('/', [mainController::class, 'index']);

Route::post('/', [mainController::class, 'submitForm']);