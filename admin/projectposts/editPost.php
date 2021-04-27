<?php
require '../session.php';
if (!isset($_SESSION['id'])){
  header("Location:login.php");
}
include_once '../sub_template.html';
require_once '../../static/connection.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = 'SELECT * FROM projectpost WHERE id =?';
try {
    $Statement = $db->prepare($sql);
    $Statement->bindParam(1, $id);
    $Statement->execute();
    if ($Statement->rowCount() >= 1) {
        $row = $Statement->fetch();
    }
} catch (PDOException $ex) {
    echo $ex;
}?>
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

    }
  </script>
</head>
<body onload="ActivePill('blog')">
  <div class="container">
  <div class="row">
      <div class="col-sm-1">
        
      </div>
      <div class="col-sm-10 " id="preview">

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
        <form method="post" action='update.php'>
        <div class='form-group'>
            <input type="hidden" name="id" value="<?php echo $id;?>">
          <label for="title">Title: </label>
          <input type="text" name="title" value="<?php echo $row['title'];?>" class='form-control'>
          <label for="post_type"> Type of post: </label>
          <textarea name="post_text" id="TextArea">
          <?php
            echo $row['content'];
          ?>
          
          </textarea>
          <input type="submit" class='btn btn-primary'>
        </div>
        </form>
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