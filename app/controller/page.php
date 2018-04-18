<?php
class Page extends Controller
{
    public function index()
    {
       Controller::view('index');
    }

    public function about()
    {
        Controller::view('about');
    }
}