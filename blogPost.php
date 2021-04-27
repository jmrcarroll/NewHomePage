<?php
include "static/template.html";
require "static/connection.php";

$sql = "SELECT * FROM blogpost;";
try {
    $Statement = $db->prepare($sql);
    $Statement->execute();
    $res ="";
    while ($row = $Statement->fetch()) {
      $res = $res . "<div class='row'><div class='col-sm-3'></div><div class='col-sm-6'><div class='h1 text-center'>". $row["title"]."</div>". $row["content"]."</div><div class='col-sm-3'></div></div></div>";
  }
} catch (PDOException $ex) {
    //cho $ex;1111
}

?>
<title> Project | John Carroll</title>
<body onload="ActivePill('projects')">
<div class="container-fluid">
    <?php print $res;?>
</div>
</body>
