<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController  as Admin;
use App\Http\Controllers\Site\SiteController as Site;
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


Route::get('/', [Site::class, 'start'])->name('start');
Route::get('/referral/{slug}/start', [Site::class, 'startCompetition'])->name('startCompetition');
Route::post('/referral/{slug}/questions', [Site::class, 'startCompetitionPost'])->name('startCompetitionPost');
Route::post('/referral/{slug}/post', [Site::class, 'competitionResult'])->name('competitionResult');
Route::get('/result/{slug}', [Site::class, 'result'])->name('result');
Route::get('/share/{slug}/{type?}', [Site::class, 'share'])->name('share');
Route::post('/', [Site::class, 'startPost'])->name('start_post');
Route::post('/create-competition', [Site::class, 'createCompetition'])->name('create_competition');

Route::middleware(['auth'])->prefix('/admin')->namespace('Admin')->group(function() {
    Route::get('/', [Admin::class, 'index'])->name('admin.home');
    Route::resources([
        'question' => '\App\Http\Controllers\Admin\QuestionController',
        'history' => '\App\Http\Controllers\Admin\QuestionHistoryController',
    ]);
});
Auth::routes();
Route::get('/register',function(){abort(404);} )->name('register');
Route::post('/register',function(){abort(404);} );
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
