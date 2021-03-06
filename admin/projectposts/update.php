<?php
require '../session.php';
if (!isset($_SESSION['id'])){
  header("Location:login.php");
}
require_once '../../static/connection.php';
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = 'UPDATE projectpost SET title = ?, content=? WHERE id =?';
try {
    $Statement = $db->prepare($sql);
    $Statement->bindParam(1, filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $Statement->bindParam(2, $_POST['post_text']);
    $Statement->bindParam(3, $id);
    $Statement->execute();
    header('location:../index.php');
    
} catch (PDOException $ex) {
    //echo $ex;
}
