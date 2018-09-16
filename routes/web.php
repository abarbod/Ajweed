<?php


/** @var \Illuminate\Routing\Router $router */

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;

$router->get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

$router->get('mobile/verify', 'Auth\VerificationController@showMobile')->name('verification.notice-mobile');
$router->get('mobile/verify/{id}', 'Auth\VerificationController@verifyMobile')->name('verification.verify-mobile');
$router->get('mobile/resend', 'Auth\VerificationController@resendMobile')->name('verification.resend-mobile');

// Account routes
$router->group(['middleware' => ['auth', 'verified-mobile']], function (Router $router) {

    $router->get('/account', 'Users\AccountController@index')
           ->name('users.account.index');

    $router->get('/details', 'Users\DetailsController@index')
           ->name('users.details.index');

    $router->get('/details/edit', 'Users\DetailsController@edit')
           ->name('users.details.edit');

    $router->put('/details/update', 'Users\DetailsController@update')
           ->name('users.details.update');

    $router->get('/account/applications', 'Users\ApplicationController@index')
           ->name('users.applications.index');
});


// Profile routes. (We use the user routeKey, {user} = routeKey)
$router->get('profile/edit', 'Users\ProfileController@edit')
       ->name('users.profile.edit')
       ->middleware('auth');

$router->post('profile', 'Users\ProfileController@store')
       ->name('users.profile.store')
       ->middleware('auth');

$router->get('profile/create', 'Users\ProfileController@create')
       ->name('users.profile.create')
       ->middleware('auth');

$router->put('profile/{profile}', 'Users\ProfileController@update')
       ->name('users.profile.update')
       ->middleware('auth');

// This route for public profile page
$router->get('profile/{user}', 'Users\ProfileController@show')
       ->name('users.profile.show');

// Events routes
$router->get('events', 'EventController@index')->name('events.index');
$router->get('events/{event}', 'EventController@show')->name('events.show');

// Events applications routes
$router->group(['middleware' => ['auth']], function (Router $router) {

    $router->get('events/{event}/applications', 'Events\EventApplicationController@index')
           ->name('events.applications.index');

    $router->post('events/{event}/applications', 'Events\EventApplicationController@store')
           ->name('events.applications.store');

    $router->delete('events/{event}/applications/{application}', 'Events\EventApplicationController@destroy')
           ->name('events.applications.destroy');
});
