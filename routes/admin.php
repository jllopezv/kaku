<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/users', function () {
        return view('Models/Auth/Users/users-index');
    })->name('users.index');