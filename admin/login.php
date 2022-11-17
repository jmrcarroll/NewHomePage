<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/Functions.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/Authentication.php");

$title = "Login | Admin | John Carroll";
$NavOption = "Admin";

if(isset($_POST['submit']))
{
   $form = Functions::secureArray($_POST);
   if(Authentication::Authenticate($form['username'],$form['password']))
   {
       if(session_status() === PHP_SESSION_NONE) session_start();
       if(isset($form['remember'])) Authentication::Remember($_SESSION['userToken']);
       Functions::redirect('/admin/index.php');
   }else{
       $alert = true;
   }
}
include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/DependenciesHandler.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/template/header.php");
?>
    <div class="container">

        <div class="mt-5 justify-content-center">
            <?php
            if(isset($alert)){
            ?>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="alert alert-warning text-center">
                        <p>Unable to login.</p>
                    </div>
                </div>
            </div>
            <?php
            }

            ?>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="h2">Log in </p>
                </div>
            </div>

        </div>
        <form method="post">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="alert alert-secondary align-self-center mx-auto container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-6 pb-2">
                                <input class="form-control" placeholder="Username" name="username">
                            </div>
                        </div>
                        <div class="row justify-content-center pb-2">
                            <div class="col-6 pt-2">
                                <input class="form-control" placeholder="Password" type="password" name="password">
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
        </form>
    </div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/template/footer.php");
?>