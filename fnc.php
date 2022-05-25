<?php

function emptyFormSU($name,$surname,$mail,$password,$passwordrpt)
{   
    $result;
    if(empty($name) || empty($surname) || empty($mail) || empty($password) || empty($passwordrpt)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function emptyFormUpdate($adress1, $city, $ZIP, $country, $phone, $img)
{   
    $result;
    if(empty($adress1) || empty($city) || empty($ZIP) || empty($country) || empty($phone) || empty($img)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyFormSI($mail,$password)
{   
    $result;
    if(empty($mail) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function checkMail($mail)
{
    $result;
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $result = false;
    }
    else
    {
        $result = true;
    }
    return $result;
}

function checkPassword($password, $passwordrpt)
{
    $result;
    if($password !== $passwordrpt)
    {
        $result = false;
    }
    else
    {
        $result = true;
    }
    
    return $result;
}

function checkUser($conn, $mail)
{
    $qry = "SELECT * FROM user WHERE user.mail = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $qry))
    {
        header("location: signup.php?error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $mail);
    mysqli_stmt_execute($stmt);

    $data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($data))
    {
        return $row;
    }
    else
    {
        $result = false;        
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function insertUser($conn, $name,$surname,$mail,$password, $usertype)
{
    $qry = "INSERT INTO user (user.userid, user.name, user.surname, user.mail, user.password, user.usertype) VALUES(UUID(),?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $qry))
    {
        header("location: signup.php?error=stmtError");
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssi", $name,$surname,$mail,$password, $usertype);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: signup.php?error=none");
    exit();
}

function updateSession($conn)
{
    $infos = $_SESSION['all_infos'];
    $_row = checkUser($conn, $infos['mail']);
    if($_row !== false)
    {
        
        $_SESSION['all_infos'] = $_row;
        $_SESSION['userid'] = ['userid'];
        $_SESSION['name'] = ['name'];
        $_SESSION['surname'] = ['surname'];
    }
}

function updateUser($conn, $adress1, $adress2, $city, $ZIP, $country, $phone, $img)
{
    session_start();
    if(isset($_SESSION["userid"]))
    {
        $qry = "UPDATE user SET user.adress1 = ?, user.adress2 = ?, user.city = ?, user.ZIP = ?, user.country = ?, user.phone = ?, user.img = ? WHERE user.userid = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $qry))
        {
            header("location: signup.php?error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssssss", str_replace(' ', '_',$adress1), str_replace(' ', '_',$adress2), str_replace(' ', '_',$city), str_replace(' ', '_',$ZIP), str_replace(' ', '_',$country), str_replace(' ', '_',$phone), str_replace(' ', '_',$img), $_SESSION["userid"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        updateSession($conn);

        header("location: userprofile.php?error=none");
        exit();
    }
    else
    {
        header("location: userprofile.php?error=sessionError");
        exit();
    }   
}

function updatePassword($conn, $newpwd)
{
    session_start();
    if(isset($_SESSION["userid"]))
    {
        $qry = "UPDATE user SET user.password = ? WHERE user.userid = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $qry))
        {
            header("location: signup.php?error=stmtError");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $newpwd, $_SESSION["userid"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        updateSession($conn);

        header("location: logout.php");
        exit();
    }
    else
    {
        header("location: userprofile.php?error=sessionError");
        exit();
    }

    
}


function checkConnection($conn, $email, $password)
{
   $info = checkUser($conn, $email);
   if($info == false)
   {
    header("location: signin.php?error=infoError");
    exit();
   }


   $dbuserpassword = $info["password"];
   $check = password_verify($password, $dbuserpassword);
   $check = $password == $dbuserpassword;

   if($check == true)
   {
       session_start();
       $_SESSION["userid"] = $info["userid"];
       $_SESSION["name"] = $info["name"];
       $_SESSION["surname"] = $info["surname"];
       $_SESSION["all_infos"] = $info;
       header("location: index.php");
       exit();
   }
   else
   {
        header("location: signin.php?error=infoError".$password);
        exit();
   }
}