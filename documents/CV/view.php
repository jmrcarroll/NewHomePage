<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/DependenciesHandler.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/DB.php");
echo DependenciesHandler::Bootstrap();
echo DependenciesHandler::DocumentStyling();

?>

<div class="pg pg-portrait">

</div>

<div class="pg pg-landscape">

</div>

<div class="pg pg-portrait">

</div>


<div class="row fixed-top">
    <div class="col-2 pl-5">
        <button>Test</button>
    </div>
</div>