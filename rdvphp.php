<?php
session_start();
if(isset($_POST["medecin"]) && isset($_SESSION["userid"]) && $_SESSION["usertype"]==1)
{
    require_once 'dbhandle.php';
    require_once 'fnc.php';
    $creneauid = $_POST["id"];
    //$mail = $_SESSION["mail"];

    //mail($mail, "Confirmation rendez-vous", "Nous confirmons votre rendez vous.", "Content-Type: text/plain; charset=utf-8\r\n", "From: tanguy.vienot.pers@gmail.com");
    insertRdv($conn, $creneauid);
    



}
else
{
    header("location: signin.php?error=submitError");
    exit();
}