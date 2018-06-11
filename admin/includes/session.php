<?php


class Session{

    private $signedIn = false;
    public  $userId;
    public $message;






    function __construct()
    {
        session_start();
        $this->checkTheLogin();// za kazdym wywolaniem obiektu klasy session uruchomiamy ta metode
        $this->checkMessage();
    }

    public function message($msg="")
    {

        if (!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }



    public function checkMessage(){

        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        else{
            $this->message = "";
        }

    }

    public function isSignedIn()
    {
        return $this->signedIn; // zwraca informacje czy user jest zalogowany czy nie
    }


    public function login($user)
    {
        if($user){
            $this->userId = $_SESSION['user_id'] = $user->id; //przypisujemy wartosc spod klucz user id z sesji i zwlasnoc obiektu user  z wlasnocis id
            $this->signedIn = true; // zmieniamy na true

        }


    }


    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($this->userId);
        $this->signedIn = false;

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
