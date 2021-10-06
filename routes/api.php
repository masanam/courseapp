<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', App\Http\Controllers\API\Admin\UsersAPIController::class);
});



Route::group(['prefix' => 'admin'], function () {
    Route::resource('user_types', App\Http\Controllers\API\Admin\UserTypesAPIController::class);
});




Route::group(['prefix' => 'admin'], function () {
    Route::resource('roles', App\Http\Controllers\API\Admin\RolesAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('permissions', App\Http\Controllers\API\Admin\PermissionsAPIController::class);
});



Route::group(['prefix' => 'admin'], function () {
    Route::resource('sliders', App\Http\Controllers\API\Admin\SlidersAPIController::class);
});




Route::group(['prefix' => 'admin'], function () {
    Route::resource('menus', App\Http\Controllers\API\Admin\MenuAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('features', App\Http\Controllers\API\Admin\FeatureAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('sections', App\Http\Controllers\API\Admin\SectionAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('categories', App\Http\Controllers\API\Admin\CategoryAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('testimonies', App\Http\Controllers\API\Admin\Admin\TestimonyAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('levels', App\Http\Controllers\API\Admin\LevelAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('faqs', App\Http\Controllers\API\Admin\FaqAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('achievements', App\Http\Controllers\API\Admin\AchievementAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('topics', App\Http\Controllers\API\Admin\TopicAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('subtopics', App\Http\Controllers\API\Admin\SubtopicAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('grades', App\Http\Controllers\API\Admin\GradeAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('subjects', App\Http\Controllers\API\Admin\SubjectAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('problems', App\Http\Controllers\API\Admin\ProblemAPIController::class);
});
