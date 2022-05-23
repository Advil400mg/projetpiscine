<?php

if(isset($_POST["submit"]))
{
    $mail = $_POST["mail"];
    $password = $_POST["password"];

    require_once 'dbhandle.php';
    require_once 'fnc.php';

    if(emptyFormSI($mail,$password) != false)
    {
        header("location: signin.php?error=emptyInput");
        exit();
    }

    checkConnection($conn, $mail, $password);

}
else
{
    header("location: index.php");
    exit();
}