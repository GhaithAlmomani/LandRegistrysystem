<?php

use MVC\controller\HomeController;
use MVC\core\Router;

Router::group([], function (){
    Router::get('/', [HomeController::class, 'index']);
    Router::get('about', [HomeController::class, 'about']);
});

Router::get('team', [HomeController::class, 'team']);




Router::get('home', [HomeController::class, 'home']);

Router::get('login', [HomeController::class, 'login']);

Router::get('contact', [HomeController::class, 'contact']);

Router::get('connect', [HomeController::class, 'connect']);
Router::post('connect', [HomeController::class, 'connect']);

Router::get('employee', [HomeController::class, 'employee']);

Router::get('ownedassets', [HomeController::class, 'ownedassets']);

Router::get('profile', [HomeController::class, 'profile']);

Router::get('register', [HomeController::class, 'register']);

Router::get('interact', [HomeController::class, 'interact']);

Router::get('learn-more', [HomeController::class, 'learnMore']);

Router::get('test', [HomeController::class, 'test']);

Router::get('update-profile', [HomeController::class, 'updateProfile']);

Router::get('watch-video', [HomeController::class, 'watchVideo']);

Router::get('watch-video2', [HomeController::class, 'watchVideo2']);

Router::get('test2', [HomeController::class, 'test2']);

Router::get('test3', [HomeController::class, 'test3']);

Router::get('test4', [HomeController::class, 'test4']);
















