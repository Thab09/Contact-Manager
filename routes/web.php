<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

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

Route::get('/create', function () {
    return view('create-contact');
})->middleware(['auth', 'verified'])->name('contact.createform');


Route::get('/dashboard', function () {
    $contacts = [];
    if (auth()->check()) {
        $contacts = auth()->user()->userContacts()->latest()->get();
    }
    return view('dashboard', ['contacts' => $contacts]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/edit-contact/{contact}', [ContactController::class, 'editContactCheck']);
    Route::put('/edit-contact/{contact}', [ContactController::class, 'editContact']);
    Route::post('/create-contact', [ContactController::class, 'createContact']);
    Route::delete('/delete-contact/{contact}', [ContactController::class, 'deleteContact']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
