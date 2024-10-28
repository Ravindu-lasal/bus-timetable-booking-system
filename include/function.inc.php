<?php

// ------------signup functions start-------------------------------

function emptyInputSignup($username, $email, $pwd )     //function check signup input is empty
{
    $result = null;
    if (empty($username) || empty($email) || empty($pwd)){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
}


function invalidUid($username)              //function check sign input name is invalid
{
    $result = null;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){   //important ! mark
        $result = true;
    } else{
        $result = false;
    }
    return $result;
}

function invalidPwd($pwd)              //function check sign input pwd is invalid

{
    $result = null ;
    if(!filter_var($pwd,)){               //------check
        $return = true;
    } else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email)        //function check sign input email is invalid
{
    $result = null;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result =true;
    }else{
        $result = false;
    }
    return $result;
}




function uidExists($conn, $username, $email)           //function check repeat same name and email
{
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_stmt_init($conn);           //check database
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../User Login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);              //string two ss  passdata
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } else{
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $email, $pwd){                           //function create users 
    $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);           //check database
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../User Login.php?error=stmtfailed2");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);                      //password encript function
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../User login.php?created=none");
    exit();
}

//---------- signup function stop-------------------


//---------- signin function start----------

function emptyInputlogin($username, $pwd)     //function check login input is empty
{
    $result = null;
    if (empty($username) || empty($pwd)){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
}


function loginUser($conn, $username, $pwd){                          //function check valid username or email in databace and login user
    $luidExists = uidExists($conn, $username, $username);
    if ($luidExists === false){
        header("Location:../User login.php?error=wrongusernameoremail");
        exit();
    }
    $pwdHashed = $luidExists["password"];                //discrypt hash password
    $checkPwd = password_verify($pwd, $pwdHashed);  //check password

    if ($checkPwd === false){                             
        header("Location:../User login.php?error=wrongpassword");
        exit();
    } 
    
    elseif ($checkPwd === true){                  //     login users session start
        session_start();
        $_SESSION["userid"]= $luidExists["user_id"];
        $_SESSION["username"]= $luidExists["username"];
        $_SESSION["useremail"]= $luidExists["email"];
        header("Location:../index.php");
    exit();
    }
}