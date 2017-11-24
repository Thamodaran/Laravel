<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;
use App\Product;
use App\User;
Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
    // Route::get('/', function () {
    //     return view('tasks', [
    //         'tasks' => Task::orderBy('created_at', 'asc')->get()
    //     ]);
    // });
    // Route::get('/', 'Controller@index');

    // Route::get('/plandetail', 'Controller@plandetailindex');

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    });
    Route::get('/', 'Controller@index');

    // Route::post('/planuser', 'Controller@store');
    //
    // Route::delete('/planuser/{id}', 'Controller@destroy');

    Route::get('/product', 'Controller@productindex');

    Route::post('/product', 'Controller@storeproduct');

    Route::delete('/product/{id}', 'Controller@destroyproduct');

    Route::get('/user', 'Controller@userindex');

    Route::post('/user', 'Controller@storeuser');

    Route::get('/user/{id}', 'Controller@showuser');

    Route::delete('/user/{id}', 'Controller@destroyuser');

    Route::get('/sales', 'Controller@salesindex');

    Route::post('/sales', 'Controller@storesales');

    Route::delete('/sales/{id}', 'Controller@destroysales');

    Route::get('/import', 'Controller@importindex');

    Route::post('/import', 'Controller@import');

//    Route::get('/searchajax/{term}', 'Controller@searchproduct');

    Route::get('/searchajax', function(){
        $products = array();
        if(isset($_GET['term'])) {
            $products = Product::where('p_product_code', 'LIKE', '%'.$_GET['term'].'%')->select('*','p_id AS id','p_product_code AS text')->get();
        }
        return $products;
    });
    
    Route::get('/searchcustomer', function(){
        $products = array();
        if(isset($_GET['term'])) {
            $products = User::where('u_name', 'LIKE', '%'.$_GET['term'].'%')->where('u_type','1')->select('*','u_id AS id','u_name AS text')->get();
        }
        return $products;
    });

    Route::get('/purchase', 'Controller@purchaseindex');

    Route::post('/purchase', 'Controller@storepurchase');

    Route::delete('/purchase/{id}', 'Controller@destroypurchase');

    Route::get('/importusers', 'Controller@importplanusers');

    Route::get('/pdf', 'Controller@pdfsales');

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    });


});
