<?php

/** @var \Illuminate\Routing\Router $router */

$router->get('/', function () {
    return view('welcome');
});

\Illuminate\Support\Facades\Auth::routes();

$router->get('/home', 'HomeController@index')->name('home');

// Profile routes
$router->get('profile/{profile}/edit', 'Users\ProfileController@edit')
    ->name('users.profile.edit')
    ->middleware('auth');
