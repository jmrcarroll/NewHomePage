<?php
require_once '../static/connection.php';

require 'session.php';

if (array_key_exists("submit",$_POST)){

    $sql = "SELECT * FROM users where username = ?;";
try {
    $Statement = $db->prepare($sql);
    $Statement->bindParam(1, $_POST["username"]);
    $Statement->execute();
    if ($Statement->rowCount() == 1) {
        while ($row = $Statement->fetch()){
            $id = $row['id'];
            $name = $row['username'];
            $dbPass= $row['pass'];
            if (password_verify($_POST['password'], $dbPass)){
                $_SESSION['id'] = $id;
                $_SESSION['user'] = $name;
                header('location:index.php');
                echo "<p>Test3</p>";
            }else{
                $result = 'Passwordword does not match!';
                include_once 'template.html';
                ?>
<div class="container">
<div class="row">
        <div class="col-sm-3">
            
        </div>
        <div class="col-sm-6">
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
             <strong></script> <?php echo $result; ?></strong> 
           </div>
           
           <script>
             $(".alert").alert();
            </script>
        </div>
        <div class="col-sm-3">
            
        </div>
</div>
    <div class="row">
        <div class="col-sm-3">
            
        </div>
        <div class="col-sm-6">
            <form action='<?php $_SERVER["PHP_SELF"];?>' method="post">
                <div class="form-group">
                <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="" placeholder="Enter Username...">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="" placeholder="Enter password..."><br>
                  <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
            
        </div>
    </div>
</div>
<?php

            }
        }
    }else{
        echo "<p>test2</p>";
    }

} catch (PDOException $ex) {
    echo $ex;
}
echo "<p>hello</P>";
}else{
    include_once 'template.html';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            
        </div>
        <div class="col-sm-6">
            <form action='<?php $_SERVER["PHP_SELF"];?>' method="post">
                <div class="form-group">
                <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="" placeholder="Enter Username...">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="" placeholder="Enter password..."><br>
                  <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
            
        </div>
    </div>
</div>
<?php
}?>