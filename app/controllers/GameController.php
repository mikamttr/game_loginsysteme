<?php

require './app/core/View.php';
require './app/models/GameModel.php';

class GameController
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->view = new View;
        $this->model = new GameModel;
    }

    public function home()
    {
        $this->view->display('home');
    }

    public function play()
    {
        // doesn't include the standard header and footer
        require_once './app/views/game.php';
    }

    public function profile()
    {
        $this->view->display('profile');
    }

    public function gameover()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $score = $_POST['score'];
            $this->model->handleGameover($score);
        }
    }
}
