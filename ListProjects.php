<?php
include "static/template.html";
require "static/connection.php";

$sql = "SELECT * FROM project;";
try {
    $Statement = $db->prepare($sql);
    $Statement->execute();
    $res ="";
    while ($row = $Statement->fetch()) {
        $res = $res . '<div class="card border-secondary p-2"><div class="card-body"><h4 class="card-title text-center">'.$row['Project_name'].'</h4><h6 class="card-subtitle text-muted"></h6><p></p><p class="card-text">'.$row['description'].'</p><div class="text-center"><a href="project.php?id='.$row['id'].'" class="card-link bg-primary p-2 text-white rounded">View posts</a></div></div></div>';    
      }
} catch (PDOException $ex) {
    echo $ex;
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
    
</div>
</body>
