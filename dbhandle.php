<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname ="piscine";

$conn = mysqli_connect($dbserver,$dbuser,$dbpassword,$dbname);

if(!$conn)
{
    die("Connection failed : " . mysqli_connect_error());
}
