<?php

use App\Http\Controllers\type_handicapController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
// Route::get('/add', function () {
//     return view('template.templateAdd');
// });
// Route::get('/view', function () {
//     return view('template.template');
// });

Route::resource('typeHandicap', type_handicapController::class);
Route::get('typeHandicap/searsh',[type_handicapController::class,"liveSearsh"])->name("typeHandicap.liveSearsh");
Route::post('typeHandicap/import',[type_handicapController::class,"import"])->name('typeHandicap.import');
Route::get('typeHandicap-export',[type_handicapController::class,"export"])->name('typeHandicap.export');
// Route::get('typeHandicap-paginate',[type_handicapController::class,"paginate"])->name('typeHandicap.paginate');
route::get('/pagination/fetch_data',[type_handicapController::class,'fetch_data'])->name('/pagination/fetch_data');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
