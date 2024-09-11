<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Notice;
use App\Models\Rule;
use App\Models\Game;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;

Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete')->middleware('auth');


Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');


Route::get('/', function () {
    return view('welcome');
});



Route::get('delete/{id}', function ($id) {
    if (auth()->user()->is_admin){
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        return "Deleted Sucessfully";
    }
    else {
        $count = 1;
        return "You will be blocked if you tried any malicious activity {Not Authorized}";
    }
});


Route::get('/dashboard', function () {
    $users = User::where('id', '!=', auth()->user()->id)->get();
    return view('dashboard', [
        'users' => $users
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/notice', function () {
    $notices = Notice::where('user_id', '!=', auth()->user()->id)->get();
    return view('notice', [
        'notices' => $notices
    ]);
})->middleware(['auth', 'verified'])->name('notice');



Route::get('/chat', function () {
    $users = User::where('id', '!=', auth()->user()->id)->get();

    return view('chat',[
        'users' => $users,

    ]);
})->middleware(['auth', 'verified'])->name('chat');


Route::get('/chat/{id}', function ($id) {
    $users = User::where('id', '!=', auth()->user()->id)->get();
    return view('chat', [
        'users' => $users,
        'id' => $id // Pass the id of the user being chatted with
    ]);
})->middleware(['auth', 'verified'])->name('chat'); // Changed route name to 'chat.show'


Route::get('/games', function () {
    $games = Game::all();
    return view('games', [
        'games'=>$games
    ]);
})->middleware(['auth', 'verified'])->name('games');


Route::get('/winners', function () {
    return view('winners');
})->middleware(['auth', 'verified'])->name('winners');



Route::get('/rules', function () {
    $rules = Rule::all();
    return view('rules', ['rules'=>$rules]);
})->middleware(['auth', 'verified'])->name('rules');



Route::get('/deposit', function () {
    return view('deposit');
})->middleware(['auth', 'verified'])->name('deposit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
