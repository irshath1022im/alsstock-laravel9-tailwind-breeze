<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StoreRequestController;
use App\Models\Item;
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

Route::get('/reports', function(Request $request){

    // return $request->has('category');
    $report_category = null;

    if($request->query('category') == 'uniforms')
    {
         $report_category = 1;
    }

    elseif($request->query('category') == 'promotional_items') {
         $report_category = 2;
    }



    $result = Item::with(['itemSize' => function($query){
                                return $query->with('size','transectionLogs','storeRequestItems')->get();
                            }])
                        ->when($request->has('category'), function($query)use($report_category){
                            return $query->where('category_id', $report_category);
                            })
                        ->take(10)
                        ->get();

    // return $result = Item::with('itemTransectionLogs')->get();



    return view('pages.reports.uniform', ['items' => $result]);
})->name('reports');

require __DIR__.'/auth.php';
