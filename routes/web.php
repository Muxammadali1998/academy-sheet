<?php

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

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/', 'App\Http\Controllers\Admin\AdminController@index');
    Route::resource('users', 'App\Http\Controllers\Admin\UsersController');
    Route::resource('activitylogs', 'App\Http\Controllers\Admin\ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);
    Route::resource('settings', 'App\Http\Controllers\Admin\SettingsController');
    Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator'])->name('generator');
    Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

});

require __DIR__.'/auth.php';


Route::resource('group/group', 'App\Http\Controllers\Group\GroupController');
Route::resource('student/student', 'App\Http\Controller\studentController');
Route::resource('lesson/lesson', 'App\Http\Controllers\Lesson\LessonController');
Route::get('/createid/{id}', [App\Http\Controllers\Lesson\LessonController::class, 'createid']);
Route::resource('monitoring/monitoring', 'App\Http\Controllers\monitoring\MonitoringController');
Route::get('/student_filter/{id}',[App\Http\Controller\studentController::class, 'filter'])->name('student_filter');
Route::get('/lesson_filter/{id}',[App\Http\Controllers\Lesson\LessonController::class, 'filter'])->name('lesson_filter');