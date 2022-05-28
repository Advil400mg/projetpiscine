<?php
require_once 'dbhandle.php';
require_once 'fnc.php';

session_start();



$user2id = $_SESSION["userid"];
$user1id = $_SESSION["destination"] ;
$user1info =  $_SESSION["destinationinfo"];

$messages = getMessages($conn, $user1id, $user2id);

while($message = $messages->fetch_assoc())
{
    if($message["user2"]==$user1id)
    {
        echo "<div class='conv leftchat'>";
        if(empty($user1info["img"]))
        {
            echo "<img src='img/default-user.png' height='70px' width='70px'>";
        }//border='1px solid #9FC6FF'
        else
        {
            echo "<img src='".$user1info['img']."' height='70px' width='70px' border='1px solid #9FC6FF' border-radius='20px 0'>";
        }
        echo "<p>".$message["msg"]."</p>";
        echo "</div>";
    }
    else
    {
        echo "<div class='conv rightchat'>";
        echo "<p>".$message["msg"]."</p>";
        if(empty($_SESSION["img"]))
        {
            echo "<img src='img/default-user.png' height='70px' width='70px'>";
        }//border='1px solid #9FC6FF'
        else
        {
            
            
            echo "<img src='".$_SESSION['img']."' height='70px' width='70px' border='1px solid #9FC6FF' border-radius='20px 0'>";
        }
        
        echo "</div>";

    }
}

