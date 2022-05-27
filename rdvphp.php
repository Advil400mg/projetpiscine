<?php
session_start();
if(isset($_POST["medecin"]) && isset($_SESSION["userid"]) && $_SESSION["usertype"]==1)
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