<?php

require './app/core/View.php';

class HomeController
{
    private $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function index()
    {
        $this->view->display('home');
    }

    public function play()
    {
        $this->view->display('game');
    }

    public function profile()
    {
        $this->view->display('profile');
    }
}
