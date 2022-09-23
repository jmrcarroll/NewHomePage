<?php

class Project
{
    private $ID;
    private $title;
    private $tasks;
    private $updates;
    private $languages;


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
     * @param mixed $updates
     */
    public function setUpdates($updates): void
    {
        $this->updates = $updates;
    }
}