<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
//     return view('welcome');
// });

Route::get('/', '\App\Http\Controllers\HomeController@Home',['as' => 'home']);


Route::get('/admission', function () {
    return view('admission');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout',["as" => 'logout']);


Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', App\Http\Controllers\Admin\UsersController::class, ["as" => 'admin']);
});



Route::group(['prefix' => 'admin'], function () {
    Route::resource('userTypes', App\Http\Controllers\Admin\UserTypesController::class, ["as" => 'admin']);
});



Route::group(['prefix' => 'admin'], function () {
    Route::resource('roles', App\Http\Controllers\Admin\RolesController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('permissions', App\Http\Controllers\Admin\PermissionsController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('sliders', App\Http\Controllers\Admin\SlidersController::class, ["as" => 'admin']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('menus', App\Http\Controllers\Admin\MenuController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('features', App\Http\Controllers\Admin\FeatureController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('sections', App\Http\Controllers\Admin\SectionController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('testimonies', App\Http\Controllers\Admin\TestimonyController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('levels', App\Http\Controllers\Admin\LevelController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('faqs', App\Http\Controllers\Admin\FaqController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('achievements', App\Http\Controllers\Admin\AchievementController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('topics', App\Http\Controllers\Admin\TopicController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('subtopics', App\Http\Controllers\Admin\SubtopicController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('grades', App\Http\Controllers\Admin\GradeController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('subjects', App\Http\Controllers\Admin\SubjectController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('problems', App\Http\Controllers\Admin\ProblemController::class, ["as" => 'admin']);
});
