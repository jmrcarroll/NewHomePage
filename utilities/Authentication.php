<?php

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
        return str_replace(['/','+','='],['*','%','!'],$passwordString); //since base64 can have +,=,/ we will remove them
    }

    public static function loggedin($session, $cookie)
    {
        if(isset($session['username'])){

            return true;
        }

        if(isset($cookie['LoginToken'])){


            return  true;
        }

        return false;
    }

    public static function Authenticate($Username, $Password)
    {

        $DB = new Databases();
        $results = $DB->execMainQuerySingleRes("SELECT * FROM `Users` where `un` = '$Username'");
        if(is_array($results) && count($results)>0){
            if(self::verifyPassword($Password, $results['hash'])){
                if(session_status() === PHP_SESSION_NONE) session_start();
                $_SESSION['userToken'] = $results['token'];
            }
            return true;
        }else{
            return false;
        }

    }

    public static function Remember($userToken)
    {
        $DB = new Databases();
        $results = $DB->execMainQuerySingleRes("SELECT * FROM `users` where `token` = '$userToken'");
        if(is_array($results) && count($results)>0){
            $rememberToken = self::generatePassword(100);
            $DB->execMainQuery("INSERT INTO `rememberToken`(`user`,`loginToken`)values('{$results['id']}','$rememberToken')")
            setcookie('LoginToken',$rememberToken,604800); //set it for a week
            return true;
        }
    }
}