<?php

require './app/core/View.php';
require './app/models/AuthModel.php';

class AuthController
{
    private $view;
    private $model;
    private $param_post;

    public function __construct()
    {
        $this->view = new View;
        $this->model = new AuthModel;

        $this->param_post = (!empty($_POST)) ? $_POST : null;

        if ($this->param_post) {
            $method = $this->param_post['action'];
            $this->model->$method($this->param_post);
        }
    }

    public function login()
    {
        $this->view->display('login');
    }

    public function signup()
    {
        $this->view->display('signup');
    }

    public function reset_password()
    {
        $this->view->display('reset_password');
    }

    public function create_new_password()
    {
        $this->view->display('create_new_password');
    }
}
