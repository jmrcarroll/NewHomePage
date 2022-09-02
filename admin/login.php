<?php
$title = "Login | Admin | John Carroll";
$NavOption = "Admin";

include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/DependenciesHandler.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/template/header.php");
?>
    <div class="container">
        <div class="mt-5 justify-content-center">
            <div class="col-12 text-center">
                <p class="h2">Log in </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-secondary align-self-center mx-auto container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-6 pb-2">
                            <input class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="row justify-content-center pb-2">
                        <div class="col-6 pt-2">
                            <input class="form-control" placeholder="Password" type="password">
                        </div>
                    </div>
                    <div class="row justify-content-center pt-2">
                        <div class="col-6">
                            <button type="submit" name="submit" class="btn btn-primary float-end">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/template/footer.php");
?>