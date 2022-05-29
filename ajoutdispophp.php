<?php

if(isset($_POST["submit"]))
{
    $docid = $_POST["id"];
    $deb = $_POST["deb"];
    $fin = $_POST["fin"];
    $date = $_POST["date"];
    $salle = $_POST["salle"];

    require_once 'dbhandle.php'; 
    require_once 'fnc.php';


    insertCreneau($conn, $docid,$deb, $fin, $date,$salle);

}
else
{
    header("location: index.php");
    exit();
}