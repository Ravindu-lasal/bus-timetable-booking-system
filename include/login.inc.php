<?php
require_once 'database.inc.php';
require_once 'function.inc.php';



// check button click login (isset)
if(isset($_POST["signin"])){
    $username = $_POST["uid"];    //get form name=
    $pwd = $_POST["pwd"];
    
    $emptyInputs =emptyInputlogin($username, $pwd);  //call login input is empty function
    

    if($emptyInputs !== false){
        header("Location:../User Login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}

//not click button
else{
    header('Location:../User Login.php?');
    exit();

}