<?php
session_start();
if(isset($_POST["update"]))
{
    $adress2 = $_POST['adress2'];
    if(empty($adress2))
    {
        $adress2 = " ";
    }
    $adress1 = $_POST['adress1'];
    $city = $_POST['city'];
    $ZIP = $_POST['ZIP'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $img = $_POST['img'];

    require_once 'dbhandle.php';
    require_once 'fnc.php';



    if(emptyFormUpdate($adress1, $city, $ZIP, $country, $phone, $img) !== false)
    {
        header("location: userprofile.php?error=emptyInput");
        exit();
    }

    if( !is_numeric($phone) || !is_numeric($ZIP))
    {
        header("location: userprofile.php?error=invalidInput");
        exit();
    }

    updateUser($conn, $adress1, $adress2, $city, $ZIP, $country, $phone, $img);

}
else if(isset($_POST["updatepwd"]))
{
    $newpwd = $_POST["newpassword"];
    $pwd = $_POST["password"];

    require_once 'dbhandle.php';
    require_once 'fnc.php';



    if(empty($pwd) || empty($newpwd))
    {
        header("location: userprofile.php?error=emptyInput");
        exit();
    }

    if(isset($_SESSION['all_infos']))
    {
        $infos = $_SESSION['all_infos'];
        if($pwd !== $infos["password"])
        {
            header("location: userprofile.php?error=wrongPassword");
            exit();
        }
    }
    else
    {
        header("location: userprofile.php?error=sessionError");
        exit();
    }



    updatePassword($conn, $newpwd);

}
else
{
    header("location: index.php?errorSubmit");
    exit();
}