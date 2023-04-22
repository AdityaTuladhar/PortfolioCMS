<?php

use Illuminate\Support\Facades\Route;
use App\SliderInfo;
use App\Details;
use App\Skills;
use App\Experience;
use App\Footer;
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
    return view('layouts.portfolio', ['sliders'=>SliderInfo::all(),'details'=>Details::findOrFail(1), 'skills'=>Skills::all(), 'experiences'=>Experience::orderBy('date','desc')->get(), 'footer'=>Footer::findOrFail(1)]);
})->name('layouts.portfolio');

// Route::get('/dashboard/experience', function () {
//     return view('dashboard.experience');
// })->name('dashboard.experience');;
Route::resource('dashboard/experience', ExperienceController::class)->only(['index','update','destroy']);

// Route::get('/dashboard', function () {
//     return view('dashboard.details');
// })->name('dashboard');

Route::resource('dashboard/details', DetailsController::class)-> only(['index','update']);

// Route::get('/dashboard/skills', function () {
//     return view('dashboard.skills');
// })->name('dashboard.skills');;

Route::resource('dashboard/skills', SkillsController::class)->only(['index','update','destroy']);

// Route::get('/dashboard/slider', function () {
//     return view('dashboard.slider');
// })->name('dashboard.slider');;

Route::resource('dashboard/slider', SliderController::class)->only(['index','update','destroy']);

Route::resource('dashboard/footer', FooterController::class)->only(['index','update']);