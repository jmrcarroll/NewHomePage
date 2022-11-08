<?php

class User
{

    private $ID;
    private $creationDate;
    private $token;
    private $removed;
    private $username;
    private $displayName;

    private function __construct($array = [])
    {
        $this->ID = $array['ID'];
        $this->token = $array['token'];
        $this->creationDate = $array['created'];
        $this->username = $array['username'];
        $this->displayName = $array['username'];
    }

    public static function ValidateExists(string $username)
    {
        $DB = new Databases();
        $user = $DB->execMainQuerySingleRes("SELECT * FROM `users` WHERE `username` = ?", [$username]);
        if($user){
            return $user['hash'];
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getID(): mixed
    {
        return $this->ID;
    }

    private static function Make($array):self
    {
        return new self($array);
    }

    public static function fromUserName($username): self|false
    {
        $DB = new Databases();
        $user = $DB->execMainQuerySingleRes("SELECT * FROM `users` WHERE `username` = ?", [$username]);
        if($user){
            return self::Make($user);
        }
        return false;
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }



}