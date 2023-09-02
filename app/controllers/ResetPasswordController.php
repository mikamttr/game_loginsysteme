<?php

require './app/core/View.php';
require './app/models/ResetPasswordModel.php';

class ResetPasswordController
{
    private $view;
    private $model;
    private $param_post;

    public function __construct()
    {
        $this->view = new View;
        $this->model = new ResetPasswordModel;

        $this->param_post = (!empty($_POST)) ? $_POST : null;

        if ($this->param_post) {
            $method = $this->param_post['action'];
            $this->model->$method($this->param_post);
        }
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
