<?php

    require_once 'dbhandle.php';
    require_once 'fnc.php';
    $user1 = $_POST["user1"];
    $user2 = $_POST["user2"];
    $usermsg = $_POST["usermsg"];

    insertmsg($conn, $user1, $user2, $usermsg);



?>