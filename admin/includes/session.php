<?php


class Session{

    private $signedIn = false;
    public  $userId;






    function __construct()
    {
        session_start();
        $this->checkTheLogin();// za kazdym wywolaniem obiektu klasy session uruchomiamy ta metode
    }


    private function checkTheLogin(){
        if(isset($_SESSION['user_id'])){ //sprawdzamy czy istnieje wartosc user_id w naszej globalnej tablicy

            $this->userId = $_SESSION['user_id']; // ustawianie wartosci userID na sawrtosc z sesji
            $this->signedIn = true; // przypisanie wartosci true do signedIN
        }

        else{

            unset($this->userId); //jesli nie ma takiej wlasnoci resetujemy
            $this->signedIn = false; // przypisujemy waetosc false
        }

    }




}

$session = new Session();
