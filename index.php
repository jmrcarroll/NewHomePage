<?php
$title = "Home | John Carroll";
$NavOption = "Home";

include_once($_SERVER['DOCUMENT_ROOT']."/utilities/DependenciesHandler.php");
echo DependenciesHandler::tinymce();

include_once($_SERVER['DOCUMENT_ROOT'] . "/template/header.php");
?>
<div class="container">

</div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/template/footer.php");
?>