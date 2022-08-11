<?php
 include_once($_SERVER['DOCUMENT_ROOT'] . "/utilities/DB.php");
class Task
{
    private $ID;
    private $TaskName;
    private $Description;
    private $Project;
    private $Status;
    private $SubTasks;


    private function __construct($array){
        $this->setID($array['ID']);
        $this->setTaskName($array['Task']);
        $this->setDescription($array['Description']);
        $this->setProject($array['Project']);
        $this->setStatus($array['Status']);
        $this->setSubTasks(subTask::getAllSubTaskByTaskID($this->getID()));

    }

    public static function fromProjectID($projectID): Task
    {
        $DB = new Databases();
        return new self($DB->execMainQuerySingleRes("SELECT * FROM Tasks WHERE `Project` = {$projectID}"));
    }
    public static function withID($id): Task
    {
        $DB = new Databases();
        return new self($DB->execMainQuerySingleRes("SELECT * FROM Tasks WHERE `ID` = {$id}"));
    }

    public static function fromArray($array): Task
    {
        return new self($array);
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
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
    public function getProject()
    {
        return $this->Project;
    }


    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @return mixed
     */
    public function getSubTasks()
    {
        return $this->SubTasks;
    }

    /**
     * @return mixed
     */
    public function getTaskName()
    {
        return $this->TaskName;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description): void
    {
        $this->Description = $Description;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @param mixed $Project
     */
    public function setProject($Project): void
    {
        $this->Project = $Project;
    }


    /**
     * @param mixed $Status
     */
    public function setStatus($Status): void
    {
        $this->Status = $Status;
    }

    /**
     * @param mixed $SubTasks
     */
    public function setSubTasks($SubTasks): void
    {
        $this->SubTasks = $SubTasks;
    }

    /**
     * @param mixed $TaskName
     */
    public function setTaskName($TaskName): void
    {
        $this->TaskName = $TaskName;
    }
}