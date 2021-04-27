<?php 
require '../session.php';
if (!isset($_SESSION['id'])){
  header("Location:login.php");
}

include_once '../sub_template.html';
require_once '../../static/connection.php';
        if ($_POST) {
          //https://www.tiny.cloud/tinymce/features/real-time-collaboration/?rtcId=doc_1b4g1o5b3s22var_dump($_POST);
          if(array_key_exists("isDraft",$_POST)){
            echo "Submit to db for As draft";
          }
          
          if((!array_key_exists("isPreview",$_POST) && !array_key_exists("isDraft",$_POST))){
            echo "Submit to db for publish";
            $num = 1;
            try {
              $query = "INSERT INTO projectpost(title,content,project)VALUES(?,?,?)";
              $Statement = $db->prepare($query);
              $Statement->bindParam(1, $_POST["title"]);
              $Statement->bindParam(2, $_POST['post_text']);
              $Statement->bindParam(3, $_POST['project']);
              $Statement->execute();
              if ($Statement->rowCount() == 1) {
                $result = '<p style="background-color:green;">Post successful</p>';
                header('location:../index.php');
            }

            } catch (PDOException $ex) {
              ?>
              <div class="bgcolor:error;">
                <p> Error: <?php echo $ex?>
              </div>
              <?php
            }

          }

        }
?>
<!DOCTYPE html>
<html>
<head>
  <title>TinyMCE Testing</title>
  <script src="https://cdn.tiny.cloud/1/br3g0zob8yn0geo20ane3arbqjacznaglyxx5vjxord7v0sn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    // Prevent Bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
    e.stopImmediatePropagation();
  }
});



    function showme(){
     document.getElementById("preview").innerHTML = document.getElementById("TextArea").innerHTML
     console.log(document.getElementById("TextArea").innerHTML)
    }
  </script>
</head>
<body onload="ActivePill('blog')">
  <div class="container">
  <div class="row">
      <div class="col-sm-1">
        
      </div>
      <div class="col-sm-10 " id="preview">
      <?php
        if (array_key_exists("isPreview",$_POST)) {
          echo "<div class='h1 text-center'>". $_POST["title"] . "</div>";
          echo $_POST["post_text"];
        }
      ?>
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
      <div class="col-sm-10">
        <form method="post" action='<?php $_SERVER["PHP_SELF"];?>'>
        <div class='form-group'>
          <label for="title">Title: </label>
          <input type="text" name="title" value="<?php if (array_key_exists("isPreview",$_POST)) {echo $_POST["title"];}else{ echo "";}?>" class='form-control'>
          <input type="number" name="project" class="form-control">
          <textarea name="post_text" id="TextArea" >
          <?php
            if (array_key_exists("isPreview",$_POST)) {
            echo $_POST["post_text"];
            }else{
              echo "Welcome to TinyMCE!";
            }
          ?>
          
          </textarea>
          <input type="submit" class='btn btn-primary'>
          </div>
        </form>
        <button onclick="showme()"></button>
      </div>
      <div class="col-sm-1">
          
      </div>
    </div>

  </div>


  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker preview',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table preview',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name'
    });
  </script>


</body>
</html>