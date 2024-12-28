<?php

namespace MVC\controller;

class HomeController extends Controller
{
    public function index(): bool|array|string
    {
        return $this->render('home.index');
    }
    public function about(): bool|array|string
    {
        return $this->render('home.about');
    }
    public function team(): bool|array|string
    {
        return $this->render('home.team');
    }


    public function home(): bool|array|string
    {
        return $this->render('home.home');
    }

    public function login(): bool|array|string
    {
        return $this->render('home.login');
    }

    public function contact(): bool|array|string
    {
        return $this->render('home.contact');
    }
    public function connect(): bool|array|string
    {
        return $this->render('home.connect');
    }
    public function employee(): bool|array|string
    {
        return $this->render('home.employee');
    }
    public function ownedassets(): bool|array|string
    {
        return $this->render('home.ownedassets');
    }
    public function profile(): bool|array|string
    {
        return $this->render('home.profile');
    }
    public function register(): bool|array|string
    {
        return $this->render('home.register');
    }
    public function interact(): bool|array|string
    {
        return $this->render('home.interact');
    }

    public function learnMore(): bool|array|string
    {
        return $this->render('home.learn-more');
    }

    public function test(): bool|array|string
    {
        return $this->render('home.test');
    }

    public function updateProfile(): bool|array|string
    {
        return $this->render('home.update-profile');
    }

    public function watchVideo(): bool|array|string
    {
        return $this->render('home.watch-video');
    }
    public function watchVideo2(): bool|array|string
    {
        return $this->render('home.watch-video2');
    }

    public function test2(): bool|array|string
    {
        return $this->render('home.test2');
    }

    public function test3(): bool|array|string
    {
        return $this->render('home.test3');
    }
    public function test4(): bool|array|string
    {
        return $this->render('home.test4');
    }








}
