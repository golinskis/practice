<?php
/**
* Created by PhpStorm.
* user: szymongolinski
* Date: 09.06.2018
* Time: 01:11
*/


class user
{

public $id;
public $username;
public $password;
public $first_name;
public $last_name;

// setery i getery dla wszystkie wlasnosci
public function setId($id) //
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



/*
* funkcja statyczna znajdz wszystkich uzytkownikow
*
*
*/
    public static function findAllUsers()
    {
        return self::findThisQuery("SELECT * FROM users");

    }

/*
* funkcja znajdz uzytkownika
*/


    public static function findUserById($id)
    {

        $theResultArray=  self::findThisQuery("SELECT * FROM users WHERE id = $id LIMIT 1");


        return  !empty($theResultArray) ? array_shift($theResultArray) : false ;

    }

/*
* Funkcja szukajaca po bazie danych
*/




    public static function findThisQuery($sql)
    {
    global  $database; // globalne uzycie obiektu database

    $resultSet = $database->query($sql); // przypisanie do zmiennej wyniku metodu zapyatnia do bazy danych

    $theObjectArray = []; // pusta tablica do ktorej bede przypisywane nowe obiekty

        while($row = mysqli_fetch_array($resultSet))
        {
            $theObjectArray[] = self::instantion($row); // przypiywanie nowych obiektow do tablicy
        }

        return $theObjectArray;
    }





    private function hasTheAttribute($property)
    {

        $objectProperties =  get_object_vars($this); // przypisanie do zmiennej wyniku wbudowanej funkcji get object vars
        //wyswietla ona wszystkie wlasnoci obiektu

            return array_key_exists($property,$objectProperties);// uzycie funkcji ktora sprawdza czy istnieja klucze takie jak podane w pierwszym parametrze w tablicy ktora jest drugim parametrem
    }




    public static function instantion($theRecord){

        $theObject = new self; // zwraca nowy obiekt wlasnej klasy

    //        $theObject->id         = $foundUser['id'];
    //        $theObject->username   = $foundUser['username'];
    //        $theObject->password   = $foundUser['password'];
    //        $theObject->first_name = $foundUser['first_name'];
    //        $theObject->last_name = $foundUser['last_name'];


        foreach ($theRecord as $property => $value) { // w foreachu iterujemy sie po rekordach do ich wlasnosci oraz wartosc
        if($theObject->hasTheAttribute($property)){ // jesli jest prawda

        $theObject->$property = $value;// przypisujemy mu wlasnosc prooperty ktora zostala zdeklarowana w funkcji hastheatribute po czym dopisujemy mu wlasnosc ktora jest w bazie danych


    }



}
        return $theObject; // zwracamy obiekt

}



}