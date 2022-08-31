<?php
$title = "Login | Admin | John Carroll";

include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/DependenciesHandler.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/template/header.php");
?>
    <div class="container">
        <div class="mt-3 row justify-content-center">
            <div class="col-9 text-center">
                <p class="h2">Log in </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 alert-secondary">
                <div class="row p-2">
                    <div class="col-12">
                        <input class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-12">
                        <input class="form-control" placeholder="Password" type="password">
                    </div>
                </div>
                <div class="row justify-content-end p-2">
                    <div class="col-3">
                        <input class="btn btn-primary" type="submit" value="Login">
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/template/footer.php");
?>