<?php

class ProjectUpdate extends Post
{

    private $projectID;
    private $tasksAssoc;


    /**
     * @return mixed
     */
    public function getProjectID()
    {
        return $this->projectID;
    }

    /**
     * @return mixed
     */
    public function getTasksAssoc()
    {
        return $this->tasksAssoc;
    }

    /**
     * @param mixed $projectID
     */
    public function setProjectID($projectID): void
    {
        $this->projectID = $projectID;
    }

    /**
     * @param mixed $tasksAssoc
     */
    public function setTasksAssoc($tasksAssoc): void
    {
        $this->tasksAssoc = $tasksAssoc;
    }



    function makeFromID($id)
    {
        // TODO: Implement makeFromID() method.
    }

    function makeFromTKN($tkn)
    {
        // TODO: Implement makeFromTKN() method.
    }

    function makeFromForm($form)
    {
        // TODO: Implement makeFromForm() method.
    }

    function makeFromDbRow($row)
    {
        // TODO: Implement makeFromDbRow() method.
    }
}