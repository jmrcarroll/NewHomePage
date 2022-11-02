<?php

class Project
{
    private $ID;
    private $title;
    private $tasks;
    private $token;
    private $updates;
    private $languages;


    private function __construct($array = array())
    {
        if(isset($array['ID'])) {
            $this->ID = $array['ID'];
            $DB = new Databases();
            $languages = $DB->execMainQuery("SELECT *,Languages.* FROM `Project-language-link`  left join Languages on Languages.ID = `Project-language-link`.`ID` where ProjectID = {$this->ID} AND `removed` = 0");
            $this->languages = [];
            foreach ($languages as $language){
                $this->languages[] = $language['LanguageName'];
            }


        }
        if(isset($array['title'])) $this->title = $array['title'];
        if(isset($array['slug'])) $this->token = $array['slug'];
        if(isset($array['ID'])) $this->tasks = Task::fromProjectID($this->ID);
        if(!isset($array['ID'])) $this->tasks = array();
        if(isset($array['ID'])) $this->updates = ProjectUpdate::fromProjectID($this->ID);
        if(!isset($array['ID'])) $this->updates = array();

    }

    public static function fromID()
    {

    }

    public static function fromArray($array)
    {
        return new self($array);
    }

    //simplification in case to save calling {Class}->title
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->title;
    }

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @return mixed
     */
    public function getTasks()
    {
        return $this->tasks;
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
    public function getUpdates()
    {
        return $this->updates;
    }


    /**
     * @param mixed $ID
     */
    public function setID($ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @param mixed $languages
     */
    public function setLanguages($languages): void
    {
        $this->langauages = $languages;
    }

    /**
     * @param mixed $tasks
     */
    public function setTasks($tasks): void
    {
        $this->tasks = $tasks;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @param mixed $updates
     */
    public function setUpdates($updates): void
    {
        $this->updates = $updates;
    }
}