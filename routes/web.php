<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::get('/', [App\Http\Controllers\User\MainController::class, 'index'])->name('welcome');
    Route::get('/page/{slug}', [App\Http\Controllers\User\MainController::class, 'pages'])->name('pages');
    Route::get('/news-list', [App\Http\Controllers\User\MainController::class, 'newsList'])->name('news-list');
    Route::get('/news/{id}', [App\Http\Controllers\User\MainController::class, 'newsItem'])->name('news-item');
    Route::get('/team-list', [App\Http\Controllers\User\MainController::class, 'teamList'])->name('team-list');
    Route::get('/programs-list', [App\Http\Controllers\User\MainController::class, 'programsList'])->name('programs-list');
    Route::get('/programs/{id}', [App\Http\Controllers\User\MainController::class, 'programsItem'])->name('programs-item');
    Route::get('/vacancies-list', [App\Http\Controllers\User\MainController::class, 'vacanciesList'])->name('vacancies-list');
    Route::get('/vacancies/{id}', [App\Http\Controllers\User\MainController::class, 'vacanciesItem'])->name('vacancies-item');
    Route::get('/files-list', [App\Http\Controllers\User\MainController::class, 'filesList'])->name('files-list');

    Route::group([
        'prefix' => 'admin',
    ], function () {
        Route::get('', [App\Http\Controllers\Admin\MainController::class, 'adminLogin'])->name('admin');
        Route::group([
            'middleware' => ['auth'],
        ], function () {
            Route::get('dashboard', [App\Http\Controllers\Admin\MainController::class, 'adminIndex'])->name('dashboard')->middleware('can:admin-superadmin');
            Route::resource('users', App\Http\Controllers\Admin\UserController::class)->middleware('can:superadmin');
            Route::resource('list_types', App\Http\Controllers\Admin\ListTypeController::class)->middleware('can:superadmin');
            Route::resource('list_categories', App\Http\Controllers\Admin\ListCategoryController::class)->middleware('can:superadmin');
            Route::resource('lists', App\Http\Controllers\Admin\ListController::class)->middleware('can:superadmin');
            Route::resource('news', App\Http\Controllers\Admin\NewsController::class)->middleware('can:admin-superadmin');
            Route::resource('statistics', App\Http\Controllers\Admin\StatisticsController::class)->middleware('can:admin-superadmin');
            Route::resource('links', App\Http\Controllers\Admin\LinksController::class)->middleware('can:admin-superadmin');
            Route::resource('menu_categories', App\Http\Controllers\Admin\MenuCategoryController::class)->middleware('can:superadmin');
            Route::resource('menus', App\Http\Controllers\Admin\MenuController::class)->middleware('can:admin-superadmin');
            Route::resource('management_categories', App\Http\Controllers\Admin\ManagementCategoryController::class)->middleware('can:superadmin');
            Route::resource('managements', App\Http\Controllers\Admin\ManagementController::class)->middleware('can:admin-superadmin');
            Route::resource('programs', App\Http\Controllers\Admin\ProgramController::class)->middleware('can:admin-superadmin');
            Route::resource('vacancies', App\Http\Controllers\Admin\VacancyController::class)->middleware('can:admin-superadmin');
            Route::resource('internal_files', App\Http\Controllers\Admin\InternalFileController::class)->middleware('can:admin-superadmin');
            Route::resource('pages', App\Http\Controllers\Admin\PageController::class)->middleware('can:admin-superadmin');
        });
    });

    Route::group(['namespace' => 'Auth'], function (Router $router) {
        $router->group([
            'prefix' => 'login',
            'middleware' => ['guest']
        ], function (Router $router) {
            $router->get('', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login');
            $router->get('token', [App\Http\Controllers\Auth\LoginController::class, 'govCallback'])->name('login.callback');
        });
        $router->get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    });


//    Route::get('/file_test', function () {
//        return view('file_test');
//    });

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
