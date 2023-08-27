<?php

class Dispatcher
{
    public function dispatch()
    {
        // Autoload classes
        spl_autoload_register(function ($class) {
            require_once 'app/controllers/' . $class . '.php';
        });

        session_start();

        if (isset($_SESSION['usersId'])) {
            $controllerName = (isset($_GET['controller'])) ? $_GET['controller'] : "home";
            $controllerName = ucfirst($controllerName) . "Controller";

            $actionName = (isset($_GET['action'])) ? $_GET['action'] : "index";
            $actionName = $actionName;
        } else {
            // User is not logged in, restrict access to HomeController
            if (isset($_GET['controller']) && $_GET['controller'] != 'auth') {
                echo "Please log in to access this page.";
                return; // Stop further processing
            }

            // For other controllers, show login page or appropriate message
            $controllerName = (isset($_GET['controller'])) ? $_GET['controller'] : "auth";
            $controllerName = ucfirst($controllerName) . "Controller";

            $actionName = (isset($_GET['action'])) ? $_GET['action'] : "login";
            $actionName = $actionName;
        }

        // Instantiate the requested controller and call the action
        $controller = new $controllerName();
        $controller->$actionName();
    }
}
