<?php

if(isset($_POST["submit"]))
{
    $username = $_POST["name"];
    $surname = $_POST["surname"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $passwordrpt = $_POST["passwordrpt"];

    require_once 'dbhandle.php';
    require_once 'fnc.php';



    if(emptyForm($username,$surname,$mail,$password,$passwordrpt) !== false)
    {
        header("location: signup.php?error=emptyInput");
        exit();
    }
    
    if(!checkMail($mail))
    {
        header("location: signup.php?error=invalidMail");
        exit();
    }

    if(checkUser($conn, $mail) !== false)
    {
        header("location: signup.php?error=userExists");
        exit();
    }

    if(!checkPassword($password, $passwordrpt))
    {
        header("location: signup.php?error=pwdMatchError");
        exit();
    }

    insertUser($conn, $username,$surname,$mail,$password,1);

}
else
{
    header("location: index.php");
    exit();
}