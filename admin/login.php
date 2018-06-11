<?php  require_once("includes/header.php");
?>


<?php


if($session->isSignedIn()){//jesli jest zalogowany przekieruj go na index.php

    redirect("index.php");

}


if(isset($_POST["submit"])) { //jesli submit zostal wyslany

    $username = trim($_POST['username']); // / przypisujemy do zmienncyh username
    $password = trim($_POST['password']);


/// Method to check database user

 $userFound = User::verifyUser($username,$password);







    if ($userFound) { //jesli uzytkownik zostal znaleziony
        $session->login($userFound); // uzywamy funckji login z klasy session
        redirect("index.php");// wracamy na index.php
    } else {
        $theMessage = "You password or username are incorrect";// jesli nie wyswietlamy wiadomosc

       echo $theMessage;
}


}
else{
    $username = "";//jesli nie zostaly wyslane parametry przypisujemy puste stringi
    $password = "";
    $theMessage ="";
}


?>

<div class="col-md-3 col-md-offset-3">

    <h4 class="bg-danger"> <?php echo $theMessage; ?></h4>

    <form id="login-id" action="" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">

        </div>


        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>


    </form>


</div>
