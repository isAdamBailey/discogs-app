<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Actions\Discogs\GetReleases;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $user = auth()->user();

    $items = [];
    if ($user->discogs_username) {
        $items = (new GetReleases())->releases($user->discogs_username);
    }

    return Inertia::render('Dashboard', [
        'releases' => $items
    ]);
})->name('dashboard');
