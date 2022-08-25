<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/Authentication.php");

if(!Authentication::loggedin($_SESSION,$_COOKIE)){
    header("location:/admin/login.php");
}

if(session_status() === PHP_SESSION_NONE) session_start();



$NavOption = "Admin";
include_once($_SERVER['DOCUMENT_ROOT'] . "/template/header.php");
