<?php
include "static/template.html";
require "static/connection.php";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM project WHERE id =". $id .";";
try {
    $Statement = $db->prepare($sql);
    $Statement->execute();
    $res ="";
    while ($row = $Statement->fetch()) {
      $res = "<div class='text-center h1'>". $row['Project_name']."</div>";
    }
} catch (PDOException $ex) {
    echo $ex;
}
$sql2 = "SELECT * FROM projectpost WHERE project =". $id .";";
try {
    $Statement = $db->prepare($sql2);
    $Statement->execute();
    $posts ="";
    while ($row = $Statement->fetch()) {
      $posts = $posts . "<div class='row'><div class='col-sm-3'></div><div class='col-sm-6'><div class='h1 text-center'>". $row["title"]."</div>". $row["content"]."</div><div class='col-sm-3'></div></div></div>";
    }
}catch(PDOException $e){
    echo $e;
}
?>
<title> Project | John Carroll</title>
<body onload="ActivePill('projects')">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-6">
            <?php print $res;?>
        </div>
        <div class="col-sm-3">

        </div>
    </div>
    <?php print $posts;?>
</div>
</body>
