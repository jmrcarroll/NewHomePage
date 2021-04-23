<?php 
require 'session.php';
if (!isset($_SESSION['id'])){
  header("Location:login.php");
}
//var_dump($_SESSION);

include "template.html";
require "../static/connection.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>ADMIN</title>
</head>
<body onload="ActivePill('blog')">
  <div class="container">
  <div class="row">
      <div class="col-sm-1">
        
      </div>
      <div class="col-sm-10 " id="">
        <div class='text-center h1'>Project posts</div>
        <a href='newPost.php'>Add New Post</a>
        <table class="table">
          <thead>
              <tr>
                  <th>title</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
        <?php
            $sql = "SELECT * FROM post where post_type = 'project';";
            try {
                $Statement = $db->prepare($sql);
                $Statement->execute();
                while ($row = $Statement->fetch()) {
                  echo "<tr><td scope='row'>". $row['title']. "</td><td><a href='editPost.php?id=".$row['id']."'>Edit</a></td><td><a href='delPost.php?id=".$row['id']."'>Delete</a></td></tr>";
                }
            } catch (PDOException $ex) {
                echo '<p>Unable to obtain posts</p>';
            }
        ?>
        </tbody>
        </table>
      </div>
      <div class="col-sm-1">
        
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <br>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-1">
        
      </div>
      <div class="col-sm-10 " id="">
        <div class='text-center h1'>Blog posts</div>
        <a href='newPost.php'>Add New Post</a>
        <table class="table">
          <thead>
              <tr>
                  <th>title</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
        <?php
            $sql = "SELECT * FROM post where post_type = 'blog';";
            try {
                $Statement = $db->prepare($sql);
                $Statement->execute();
                while ($row = $Statement->fetch()) {
                  echo "<tr><td scope='row'>". $row['title']. "</td><td><a href='editPost.php?id=".$row['id']."'>Edit</a></td><td><a href='delPost.php?id=".$row['id']."'>Delete</a></td></tr>";
                }
            } catch (PDOException $ex) {
                echo '<p>Unable to obtain posts</p>';
            }

        ?>
        </tbody>
        </table>
      </div>
      <div class="col-sm-1">
          
      </div>
    </div>

  </div>
</body>
</html>