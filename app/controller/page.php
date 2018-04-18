<?php
class Page extends Controller
{
    private $model;

    public function __construct()
    {

    }

    // Login page
    public function login()
    {
        Controller::view('layouts/header',[]);
        Controller::view('login',[]);
        Controller::view('layouts/footer',[]);
    }

    // About page Dummy or Sample
    public function about()
    {
        Controller::view('layouts/header',[]);
        Controller::view('about',[]);
        Controller::view('layouts/footer',[]);
    }

    // Sign up page
    public function signup()
    {
        Controller::view('layouts/header',[]);
        Controller::view('signup',[]);
        Controller::view('layouts/footer',[]);
    }
}