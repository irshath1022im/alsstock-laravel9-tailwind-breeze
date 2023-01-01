<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StoreRequestController;
use App\Models\StoreReuqest;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('items', ItemController::class);


Route::resource('categories', CategoryController::class);

Route::resource('storeRequest', StoreRequestController::class);

Route::get('storeRequest/print/{id}', function($id){

    $result = StoreReuqest::with(['storeRequestItems'=> function($query){
        return $query->with(['itemSize' => function($query){
            return $query->with(['item', 'size']);
        }]);
    }])->findOrFail($id);


    return view('pages.storeRequest.printRequest',['store_request' => $result]);

})->name('StoreRequestPrint');

require __DIR__.'/auth.php';
