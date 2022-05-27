<?php

if(isset($_POST["medecin"]) && isset($_SESSION["userid"]))
{
    require_once 'dbhandle.php';
    require_once 'fnc.php';
    $creneauid = $_POST["id"];
    insertRdv($conn, $creneauid);

}
else
{
    header("location: signin.php?error=submitError");
    exit();
}