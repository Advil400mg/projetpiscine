<?php
    ini_set('session.cache_limiter','public');
    session_cache_limiter(false);
    include_once 'header.php';
    require_once 'dbhandle.php';
    require_once 'fnc.php';

    if(!isset($_POST["chat"]) && $_SESSION["usertype"]!=2)
    {
        header("location: search.php?error=chaterror");
        exit();
    }
    elseif(!isset($_POST["chat"]) && $_SESSION["usertype"] == 2)
    {
        $user1id = "4260bebf-dec3-11ec-b477-3c7c3fd3773d";
    }
    else
    {
        $user1id = $_POST["id"];
    }

    
    $user2id = $_SESSION["userid"];


    $_SESSION["destination"] = $user1id;
    $user1info = getUserbyID($conn, $user1id)->fetch_assoc();
    $_SESSION["destinationinfo"] = $user1info;

?>


<div class="wrapper">
    <div class="chat">
        <div class="chat-top">

            <div class="destination">
                <?php
                    echo "<h1>".$user1info["name"]." ".$user1info["surname"]."</h1>";
                ?>
            </div>

        </div>

        <div class="chat-content">
        <script>
            setInterval('loadmessages()', 500);
            function loadmessages(){
                $('.chat-content').load('getmessages.php');
            }
        </script>
        </div>

            <form class="chat-form" method="POST">
                <div class="chatinput" >
                    <?php
                    echo "<input type='hidden' id='user1id' name='user1id' value=".$user1id.">";
                    echo "<input type='hidden' id='user2id' name='user2id' value=".$user2id.">";
                    ?>
                    <textarea name="msg" id='usermsg' placeholder="Entrez votre message..."></textarea>
                
                <button class="submitchat" type='button' name="submitchat" onclick="post()">
                    Envoyer
                </button>
                </div>
            </form>       

    </div>
</div>

<script>
function post() {
    var data = new FormData();
    var user1 = $("#user1id").val();
    var user2 = $("#user2id").val();
    var usermsg = $("#usermsg").val();

    $.post("sendmessage.php", {user1: user1, user2: user2, usermsg: usermsg});

    $("#usermsg").val("");


}
</script>

<?php
    include_once 'footer.php';
?>