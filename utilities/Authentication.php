<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Classes/User.php");
include_once($_SERVER['DOCUMENT_ROOT']."/utilities/DB.php");

class Authentication
{


    public static function verifyPassword($SubmittedPassword, $hash)
    {
       return password_verify($SubmittedPassword, $hash);
    }

    public static function generatePassword($length = 12)
    {
        $base64str = base64_encode(openssl_random_pseudo_bytes(255)); //generate base64 string
        $passwordString = substr($base64str,rand(0,(strlen($base64str)-24)),$length); //select a random substring of 12 character from within
        return str_replace(['/','+','='],['','',''],$passwordString); //since base64 can have +,=,/ we will remove them
    }

    public static function loggedin($session, $cookie)
    {
        if(isset($session['userToken'])){

            return User::fromToken($session['userToken']);
        }

        if(isset($cookie['LoginToken'])){

            return User::fromToken($cookie['LoginToken']);
        }

        return false;
    }

    public static function Authenticate($Username, $Password)
    {
        $DB = new Databases();
        $exists = User::ValidateExists($Username);
        if($exists){
            if(self::verifyPassword($Password, $exists)){
               $User = User::fromUserName($Username);
                if(session_status() === PHP_SESSION_NONE) session_start();
                $_SESSION['userToken'] = $User->getToken();
                return true;
            }
        }else{
            return false;
        }
        return false;
    }

    public static function Remember($userToken)
    {
        $DB = new Databases();
        $results = $DB->execMainQuerySingleRes("SELECT * FROM `users` where `token` = '$userToken'");
        if(is_array($results) && count($results)>0){
            $rememberToken = self::generatePassword(100);
            $expiry = date("Y-m-d",strtotime("+1 week"));
            $DB->execMainQuery("INSERT INTO `rememberToken`(`user`,`loginToken`,expiry)values('{$results['id']}','{$rememberToken}','{$expiry}')");
            setcookie('LoginToken',$rememberToken,604800); //set it for a week
            return true;
        }
    }
}