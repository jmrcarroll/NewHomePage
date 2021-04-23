<?php
    require 'session.php';
    $_SESSION = array();
    session_unset();
    session_regenerate_id(true);
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_destroy();
    header('location:login.php');
?>