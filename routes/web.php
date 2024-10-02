<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\IsAdminUser;

use App\Http\Controllers\BookController;
use App\Http\Controllers\SecurityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    $name = "John";
    $age = 31;
    $cities = ["New York", "London", "Paris", "Tokyo"];

    /*
    return "<h1 style='text-align:center; margin-top:20px;'>
                Hello $name, you are $age years old and you live in $cities[0]
            </h1>";
    */

    // return view('test.greeting', compact('name', 'age', 'cities'));

    /*
    return view('test.greeting', [
        'name' => $name,
        'age' => $age,
        'cities' => $cities
    ]);
    */

    /*
    return view::make('test.greeting', [
        'name' => $name,
        'age' => $age,
        'cities' => $cities
    ]);
    */

    return view('test.greeting')
        ->with('name', $name)
        ->with('age', $age)
        ->with('cities', $cities);
});

Route::get('/test', function () {
    return view('test.test');
});

// Route::get('/books', 'App\Http\Controllers\BookController@showBooks');

Route::get('/books', BookController::class . '@showBooks');

// Route::get('/books/{id}', 'App\Http\Controllers\BookController@showBook');

Route::get('/books/{id}', BookController::class . '@showBook');

Route::get('/admin', SecurityController::class . '@admin')->middleware(IsAdminUser::class);

Route::get('/login', SecurityController::class . '@login');
