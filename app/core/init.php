<?php

require_once 'app/Database.php';
require_once 'app/helpers/helper.php';
require_once 'app/Dispatcher.php';

session_start();

$dispatcher = new Dispatcher;
$dispatcher->dispatch();
