<?php
class Databases{

    private const DBHost = '';
    private const user = '';
    private const pass = '';

    //Each DB is a property
    private PDO $MainDB;

    //Establish connection
    public function __construct()
    {
        try {
            //define each DB name in the constructor.
            $this->MainDB= new PDO(self::DBHost."dbname=jmrcarroll", self::user, self::pass);
            //$this->MainDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); //enable this before production
            $this->MainDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //echo "Connected to database.";
        }
        catch (PDOException $ex)
        {
            echo "connection Failed: \n" . $ex; //disable this before deploy
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

    //UsersDB
    private function MainDBGetAll($sql,$parameters = array())
    {
        return self::getAll($this->MainDB, $sql,$parameters);
    }
    private function MainDBGetSingle($sql,$parameters = array())
    {
        return self::getSingle($this->MainDB, $sql,$parameters );
    }
    private function MainDBInsert($sql,$parameters = array())
    {
        return self::insert($this->MainDB, $sql,$parameters);
    }
    private function MainDBUpdate($sql,$parameters = array()): bool
    {
        return self::update($this->MainDB, $sql,$parameters);
    }

    public function execMainQuery($sql,$parameters = array())
    {
        $sqlType = explode(" ", $sql);

        switch (strtoupper($sqlType[0])){
            CASE "SELECT": $res = $this->MainDBGetAll($sql, $parameters); break;
            CASE "UPDATE": $res = $this->MainDBUpdate($sql, $parameters); break;
            CASE "INSERT": $res = $this->MainDBInsert($sql, $parameters); break;
            DEFAULT: $res = false; break;
        }
        return $res;
    }
    public function execMainQuerySingleRes($sql, $parameters = array()){
        return $this->MainDBGetSingle($sql, $parameters);
    }
}
?>