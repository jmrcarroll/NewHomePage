<?php

abstract class Post
{
    private $ID;
    private $title;
    private $contents;
    private $Date;
    private $token;


    protected function __construct($array = array()){
        if(isset($array['ID'])) $this->ID = $array['ID'];
        if(isset($array['title'])) $this->title = $array['title'];
        if(isset($array['contents'])) $this->contents = $array['contents'];
        if(isset($array['Date'])) $this->Date = $array['Date'];
        if(isset($array['tkn'])) $this->token = $array['tkn'];
    }


    abstract function makeFromID($id);  //these functions should fold into makeFromDbRow but should call the same result.
    abstract function makeFromTKN($tkn);

    abstract function makeFromForm($form); // these two should just be the same function, but called differently simply for debug purposes.
    abstract function makeFromDbRow($row); // mainly to follow the thought exercise


    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }


    /**
     * @param mixed $ID
     */
    public function setID($ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @param mixed $contents
     */
    public function setContents($contents): void
    {
        $this->contents = $contents;
    }

    /**
     * @param mixed $Date
     */
    public function setDate($Date): void
    {
        $this->Date = $Date;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

}