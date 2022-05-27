<?php

if(isset($_POST["medecin"]))
{
    require_once 'dbhandle.php';
    require_once 'fnc.php';
    $creneauid = $_POST["id"];
    deleteRdv($conn, $creneauid);

}
else
{
    header("location: smesrendezvous.php?error=submitError");
    exit();
}