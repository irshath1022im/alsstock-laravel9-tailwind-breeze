<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StoreRequestController;
use App\Http\Livewire\Pages\ConsumptionsHome;
use App\Http\Livewire\Pages\StockSummaryReport2;
use App\Http\Livewire\Pages\StockSummaryReport3;
use App\Models\Item;
use App\Models\Store;
use App\Models\StoreReuqest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::resource('storeRequest', StoreRequestController::class)->middleware('auth');

Route::get('storeRequest/print/{id}', function($id){

    $result = StoreReuqest::with(['storeRequestItems'=> function($query){
        return $query->with(['itemSize' => function($query){
            return $query->with(['item', 'size']);
        }]);
    }])->findOrFail($id);


    return view('pages.storeRequest.printRequest',['store_request' => $result]);

})->name('StoreRequestPrint');

Route::get('approvedStoreRequest/print/{id}', function($id){

    return view('pages.storeRequest.approvedPdf',['pdf_id' => $id]);

})->name('approvedPdf');

Route::get('/reports', function(Request $request){


    return view('pages.reports.home');
})->name('reports');


Route::get('/reports/uniforms', function(Request $request){


     $result = Store::with(['items' => function($query){
        return $query->with(['itemSize' => function($query){
            return $query->with('size','transectionLogs','storeRequestItems')->get();
        }]);
     }])->find(1);
    // return $result = Item::with('itemTransectionLogs')->get();



    return view('pages.reports.uniform', ['store' => $result]);
})->name('uniformReports');

Route::get('/reports/promotionalItems', function(Request $request){


    $result = Store::with(['items' => function($query){
       return $query->with(['itemSize' => function($query){
           return $query->with('size','transectionLogs','storeRequestItems')->get();
       }]);
    }])->find(2);


   return view('pages.reports.uniform', ['store' => $result]);
})->name('promotionalItemsReports');

Route::get('repots/consumptionReport', ConsumptionsHome::class)->name('consumptionPage');


Route::get('reports/summary', StockSummaryReport3::class )->name('reportSummary');

require __DIR__.'/auth.php';


Route::get('admin', [ItemController::class, 'index'])->middleware('auth');
