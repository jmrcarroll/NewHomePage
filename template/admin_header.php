<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/Authentication.php");
if(session_status() === PHP_SESSION_NONE) session_start();

if(!Authentication::loggedin($_SESSION,$_COOKIE) && $_SERVER['REQUEST_URI'] != "/admin/login.php"){
    include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/Functions.php");
    Functions::redirect("/admin/login.php");
}


$NavOption = "Admin";
include_once($_SERVER['DOCUMENT_ROOT'] . "/template/header.php");
