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

    Route::delete('/user/{id}', 'Controller@destroyuser');

    Route::get('/sales', 'Controller@salesindex');

    Route::post('/sales', 'Controller@storesales');

    Route::delete('/sales/{id}', 'Controller@destroysales');

    Route::get('/searchajax/{name}', 'Controller@searchproduct');

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
