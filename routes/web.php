<?php

/** @var \Illuminate\Routing\Router $router */

$router->get('/', function () {
    return view('welcome');
});

\Illuminate\Support\Facades\Auth::routes();

$router->get('/home', 'HomeController@index')->name('home');
