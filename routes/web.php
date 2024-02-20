<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ChangeLocaleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FabricsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SustainabilityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Auth::routes([
    'verify' => true,
]);

Route::get('/', HomeController::class)
    ->name('home');
Route::get('fabrics', FabricsController::class)
    ->name('fabrics');
Route::get('process', ProcessController::class)
    ->name('process');
Route::get('sustainability', SustainabilityController::class)
    ->name('sustainability');
Route::get('projects', ProjectsController::class)
    ->name('projects');
Route::get('about-us', AboutUsController::class)
    ->name('about-us');
Route::get('contact', [ContactController::class, 'view'])
    ->name('contact.view');

Route::get('change-locale/{locale}', ChangeLocaleController::class)
    ->name('change-locale');


Route::middleware(ProtectAgainstSpam::class)
    ->group(function () {
        Route::post('contact', [ContactController::class, 'mail'])
            ->name('contact.mail');
    });

//Route::middleware('auth')
//    ->group(function () {
//        Route::get('storage-link', function () {
//            $exitCode = Artisan::call('storage:link');
//
//            echo $exitCode;
//        })
//            ->name('storage-link');
//    });

