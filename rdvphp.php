<?php

if(isset($_POST["medecin"]))
{
    require_once 'dbhandle.php';
    require_once 'fnc.php';
    $creneauid = $_POST["id"];
    insertRdv($conn, $creneauid);

}
else
{
    header("location: search.php?error=submitError");
    exit();
}