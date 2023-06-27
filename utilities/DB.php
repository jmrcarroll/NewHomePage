<?php

class DBHandler extends Databases
{
    //singleton property
    private self $DBHandler;

    private const DBHost = self::DBHost;
    private const user = self::user;
    private const pass = self::pass;

    private const DBNames = [
        "MainDB" => "jmrcarroll",
    ];
    
    //Each DB is a property
    private PDO $MainDB;

    private Function __construct(){
        self::CreateConnection(self::DBNames);
    }

    public static function InitialiseHandler(){
        if(!isset($this->DBHandler)) $this->DBHandler = new DBHandler();
        return $this->DBHanlder;
    }

    public function execMainQuery($sql,$parameters = array())
    {
        $sqlType = explode(" ", $sql);

        switch (strtoupper($sqlType[0])){
            CASE "SELECT": $res = self::getAll($this->MainDB, $sql,$parameters); break;
            CASE "UPDATE": $res = self::update($this->MainDB, $sql,$parameters); break;
            CASE "INSERT": $res = self::insert($this->MainDB, $sql,$parameters); break;
            DEFAULT: $res = false; break;
        }
        return $res;
    }
    
    public function execMainQuerySingleRes($sql, $parameters = array())
    {
        return self::getSingle($this->MainDB, $sql,$parameters );
    }
}

class Databases
{

    private const DBHost = self::DBHost;
    private const user = self::user;
    private const pass = self::pass;



    //Establish connection
    protected function __construct()
    {
    }

    protected function ConnectionLoop($array)
    {
        foreach ($array as $key => $value) {
            $this->$key = static::CreateConnection($value);
        }
    }


    protected function CreateConnection($DBName, $Host = null, $User = null, $Pass = null)
    {
        if(is_null($Host)) $Host = static::DBHost;
        if(is_null($User)) $User = static::user;
        if(is_null($Pass)) $Host = static::pass;

        try {
            $Connection = new PDO("mysql:host=".$Host.";dbname=".$DBName, $User, $Pass);
            $Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $Connection->setAttribute(PDO::ATTR_PERSISTENT, true);
            return $Connection;
        }
        catch (PDOException $ex)
        {
            echo "connection Failed: \n" . $ex; //disable this before deploy
            return false;
        }
    }

    //Secures string
    public static function SecureString($string)
    {
        return htmlspecialchars(stripslashes((trim($string))));
    }

    //Refactoring of common parts of Query building
    private static function prepareStatement($con, $sql, $parameters = array())
    {
        $Statement = $con->prepare($sql);
        $i = 1;

        foreach ($parameters as $item)
        {
            $type = gettype($item);

            switch ($type){
                case "integer":
                    $type = PDO::PARAM_INT;
                    break;
                case "boolean":
                    $type = PDO::PARAM_BOOL;
                    break;
                case "NULL":
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
            $Statement->bindValue($i,$item,$type);


            $i++;

        }

        return $Statement;
    }

    //CommonQueries
    /**
     * select all return as array of rows (also arrays) else empty array
     * @param $con
     * @param $sql
     * @param $parameters
     * @return array|mixed
     */
    private static function getAll($con, $sql,$parameters = array())
    {
        $Statement = self::prepareStatement($con, $sql,$parameters);
        try{
            $Statement->execute();
            if ($Statement->rowCount()) {
                return $Statement->fetchAll();
            } else {
                return array();
            }
        }catch (PDOException $ex){
            return array();
        }
    }

    /**
     * select return array of 1 row
     * @param $con
     * @param $sql
     * @param $parameters
     * @return false|mixed
     */
    private static function getSingle($con, $sql, $parameters = array())
    {
        $Statement = self::prepareStatement($con, $sql, $parameters);

        try
        {
            $Statement->execute();
            if ($Statement->rowCount())
            {
                return $Statement->fetch();
            }
            else
            {
                return false;
            }
        }
        catch (PDOException $ex)
        {
            return false;
        }
    }

//insert and return id else false

    private static function insert($con, $sql, $parameters = array())
    {
        $Statement = self::prepareStatement($con, $sql, $parameters);

        try
        {
            $result = $Statement->execute();
            if ($result)
            {
                return $con->lastInsertId();
            }
            else
            {
                return false;
            }
        }
        catch (PDOException $ex)
        {
            return false;
        }



    }

//update and return true else false
    private static function update($con, $sql, $parameters = array())
    {
        $Statement = self::prepareStatement($con, $sql, $parameters);

        try
        {
            $result = $Statement->execute();
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        catch(PDOException $ex)
        {
            return false;
        }
    }

}
?>