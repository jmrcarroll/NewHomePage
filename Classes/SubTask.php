<?php

class SubTask
{
    private $ID;
    private $TaskID;
    private $title;
    private $description;

    protected function __construct($array)
    {
        if(isset($array['id'])) $this->ID = $array['id'];
        $this->TaskID = $array['Task_id'];
        $this->title = $array['title'];
        $this->description = $array['desc'];
    }

    public static function getAllSubTaskByTaskID($taskID)
    {
        $DB = new Databases();
        $subtasks = $DB->execMainQuery();

        $subtaskList = [];
        foreach ($subtasks as $subtask){
            $subtaskList[] = self::fromDBRow($subtask);
        }
        return $subtaskList;
    }

    public static function fromSTID($SubTaskID) :self
    {
        $DB = new Databases();
        $array = $DB->execMainQuerySingleRes();
        return self::fromDBRow($array);
    }
    public static function fromDBRow($array) : self
    {
        return new self($array);
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
    public function getTaskID()
    {
        return $this->TaskID;
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
    public function getDescription()
    {
        return $this->description;
    }
}