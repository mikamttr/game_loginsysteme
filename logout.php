<?php
require_once 'app/helpers/helper.php';

session_start();
unset($_SESSION['usersId']);
unset($_SESSION['usersName']);
unset($_SESSION['usersEmail']);
session_destroy();
redirect("index.php");
