<?php
/**
 * Created by PhpStorm.
 * User: szymongolinski
 * Date: 08.06.2018
 * Time: 23:42
 */
require_once ("new_config.php");

class Database
{
    public $connection; // tworzenie prywatnej własnoci

    function __construct() //
    {
        $this->openDbConnection();
    }

    public function openDbConnection()//metoda otwierajaca polaczeni za pomoca zincludowanego config.php
    {


//        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if($this->connection->connect_errno){
            die("Database connection failed badly" . $this->connection->connect_error());
        }
    }



    public function query($sql)
    {
        $result = $this->connection->query($sql);
        $this->confirmQuery($result);
        return $result;
    }


    private function confirmQuery($result)
    {
        if(!$result){
            die("Query Failed". $this->connection->error);
        }

    }

    public function escapeString($string)
    {
       $escapedString =  $this->connection->real_escape_string($string);
       return $escapedString;
    }

    public function theInsertID(){
        return $this->connection->insert_id;
    }

}

$database = new Database(); // nowy obiekt db

