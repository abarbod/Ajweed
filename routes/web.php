<?php

/** @var \Illuminate\Routing\Router $router */

$router->get('/', function () {
    return view('welcome');
});

\Illuminate\Support\Facades\Auth::routes();

$router->get('/home', 'HomeController@index')->name('home');

// Profile routes. (We use the user routeKey, {user} = routeKey)
$router->get('profile/{user}/edit', 'Users\ProfileController@edit')
       ->name('users.profile.edit')
       ->middleware('auth');

$router->post('profile', 'Users\ProfileController@store')
       ->name('users.profile.store')
       ->middleware('auth');

$router->get('profile/create', 'Users\ProfileController@create')
       ->name('users.profile.create')
       ->middleware('auth');

$router->get('profile/{user}', 'Users\ProfileController@show')
       ->name('users.profile.show')
       ->middleware('auth');

$router->put('profile/{user}', 'Users\ProfileController@update')
       ->name('users.profile.update')
       ->middleware('auth');
