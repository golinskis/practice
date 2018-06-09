<?php
/**
 * Created by PhpStorm.
 * User: szymongolinski
 * Date: 09.06.2018
 * Time: 01:11
 */


class User
{

public $id;
public $username;
public $password;
public $first_name;
public $last_name;


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

public function getId(){
    return $this->id;
}


    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }


    public function getFirstName()
    {
        return $this->first_name;
    }


    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }


    public function getLastName()
    {
        return $this->last_name;
    }


    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    public static function findAllUsers()
{
 return self::findThisQuery("SELECT * FROM users");

}

    public static function findUser($id)
    {
        $resultSet =  self::findThisQuery("SELECT * FROM users WHERE id = $id LIMIT 1");
        $foundUser = mysqli_fetch_array($resultSet);
        return $foundUser;

    }

    public static function findThisQuery($sql)
{
    global  $database;
    $resultSet = $database->query($sql);
    $theObjectArray = [];
    while($row = mysqli_fetch_array($resultSet))
    {
        $theObjectArray[] = self::instantion($row);
    }

    return $theObjectArray;
}


private function hasTheAttribute($property)
{

    $objectProperties =  get_object_vars($this);

   return array_key_exists($property,$objectProperties);
}

public static function instantion($theRecord){

        $theObject = new self;
//        $theObject->id         = $foundUser['id'];
//        $theObject->username   = $foundUser['username'];
//        $theObject->password   = $foundUser['password'];
//        $theObject->first_name = $foundUser['first_name'];
//        $theObject->last_name = $foundUser['last_name'];


    foreach ($theRecord as $property => $value) {
        if($theObject->hasTheAttribute($property)){

            $theObject->property = $value;


        }



    }
        return $theObject;

}



}