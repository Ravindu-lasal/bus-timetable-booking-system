<?php
require_once 'database.inc.php';
require_once 'function.inc.php';

//check button click signup (isset) 
if(isset($_POST["signup"])){   //form button name=
    $username = $_POST["name"];  
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
   
    //call functions
    $emptyInputs = emptyInputSignup($username, $email, $pwd );
    $invalidUid = invalidUid($username);   //check valid name format
    $invalidEmail = invalidEmail($email);  //check email is valid format
    // $pwdMatch = pwdMatch($pwd, $pwdMatch);
    $uidExists = uidExists($conn, $username, $email);   //check anyone have create same name or email in databasa
    
    if($emptyInputs !== false){
        header("Location:../User Login.php?error=emptyinput");
        exit();
    }

    if( $invalidUid !== false){
        header("Location:../User Login.php?error=invalidUid");
        exit();
    }

    if($invalidEmail !== false){
        header("Location:../User Login.php?error=invalidEmail");
        exit();
    }

    if( $uidExists !== false){
        header("Location:../User Login.php?error=usernameoremailtaken");
        exit();
    }

    createUser($conn, $username, $email, $pwd);       //create users 
    
    
}

else{
    header('Location:../User Login.php?');
    exit();
}