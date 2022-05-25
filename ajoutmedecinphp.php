<?php

if(isset($_POST["submit"]))
{
    $username = $_POST["name"];
    $surname = $_POST["surname"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $specialite = $_POST["specialite"];

    require_once 'dbhandle.php';
    require_once 'fnc.php';



    if(emptyFormSU($username,$surname,$mail,$password,$specialite) !== false)
    {
        header("location: ajoutmedecin.php?error=emptyInput");
        exit();
    }
    
    if(!checkMail($mail))
    {
        header("location: ajoutmedecin.php?error=invalidMail");
        exit();
    }

    if(checkUser($conn, $mail) !== false)
    {
        header("location: ajoutmedecin.php?error=userExists");
        exit();
    }

    insertMedecin($conn, $username,$surname,$mail,$password,2, $specialite);

}
else
{
    header("location: index.php");
    exit();
}