<?php

/**
 * Core view class
 */

class View
{
    public function display($file)
    {
        require_once './app/views/_templates/header.php';
        require_once './app/views/' . $file . '.php';
        require_once './app/views/_templates/footer.php';
    }
}
