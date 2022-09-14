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

        if(isset($cookie['loginData'])){


            return  true;
        }

        return false;
    }

    public static function Authenticate($Username, $Password)
    {

        $DB = new Databases();
        $results = $DB->execMainQuerySingleRes("SELECT * FROM `Users` where `un` = '$Username'");
        if($results){
            return self::verifyPassword($Password, $results['hash']);
        }else{
            return false;
        }

    }
}