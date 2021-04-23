<?php
require 'session.php';
if (!isset($_SESSION['id'])){
  header("Location:login.php");
}
require_once '../static/connection.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = 'DELETE FROM post WHERE id =?';
try {
    $Statement = $db->prepare($sql);
    $Statement->bindParam(1, $id);
    $Statement->execute();
    header('location:index.php');
    
} catch (PDOException $ex) {
    //echo $ex;
}
