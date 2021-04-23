<?php
include "static/template.html";
require "static/connection.php";

$sql = "SELECT * FROM post where post_type = 'project';";
try {
    $Statement = $db->prepare($sql);
    $Statement->execute();
    $res ="";
    while ($row = $Statement->fetch()) {
      $res = $res . "<div class='row'><div class='col-sm-3'></div><div class='col-sm-6'><div class='h1 text-center'>". $row["title"]."</div>". $row["post_text"]."</div><div class='col-sm-3'></div></div></div>";
  }
} catch (PDOException $ex) {
    //cho $ex;
}

?>
<title> Project | John Carroll</title>
<body onload="ActivePill('projects')">
<div class="container-fluid">
    <?php print $res;?>
</div>
</body>
