<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PolygonController;
use App\Http\Controllers\PolylineController;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function () {
    return Redirect()->route('polygon.index');
});
Route::resource('maps', PageController::class);
Route::get('polygon/index', [PolygonController::class,'index'])->name('polygon.index');
Route::get('polygon/add', [PageController::class,'polygoneAdd'])->name('polygon.add');
Route::get('polygon/store', [PolygonController::class,'store']);
Route::get('polygon/delete', [PolygonController::class,'delete'])->name('polygon.delete');

// point
Route::get('point/index', [PointController::class,'index'])->name('point.index');
Route::get('point/add', [PageController::class,'pointAdd'])->name('point.add');
Route::get('point/store', [PointController::class,'store'])->name('point.store');
Route::get('point/delete', [PointController::class,'delete'])->name('point.delete');
// polyline
Route::get('polyline/index', [PolylineController::class,'index'])->name('polyline.index');
Route::get('polyline/add', [PageController::class,'polylineAdd'])->name('polyline.add');
Route::get('polyline/store', [PolylineController::class,'store']);
Route::get('polyline/delete', [PolylineController::class,'delete'])->name('polyline.delete');