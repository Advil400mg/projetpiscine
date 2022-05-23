<?php

function emptyForm($name,$surname,$mail,$password,$passwordrpt)
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
        header("location: signup.php?error=stmtErrora");
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
        header("location: signup.php?error=stmtErrorb");
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssi", $name,$surname,$mail,$hash, $usertype);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: signup.php?error=none");
    exit();

    
}