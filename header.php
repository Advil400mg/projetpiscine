<?php
    session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="headerstyle.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="chat.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <title>Doctomnes</title>

</head>
<body>
    <header>
        <img class="logo" src="img/logo.jpg" width = "120px" height = "48px" alt="logo">
        <nav>
            <ul class = "menu">
                
                <li><a href="index.php">Accueil</a></li>
                <li><a href="browser.php">Tout Parcourir</a></li>
                <li><a href="search.php">Recherche</a></li>

                <?php
                    if(isset($_SESSION["userid"]) && $_SESSION["usertype"]!=3)
                    {
                        echo "<li><a href='mesrendezvous.php'>Rendez-vous</a></li>";
                        echo "<li><a href='userprofile.php'>Votre Compte</a></li>";
                    }
                    if(isset($_SESSION["userid"]) && $_SESSION["usertype"]==3)
                    {
                        echo "<li><a href='ajoutmedecin.php'>Medadd</a></li>";
                    }
                    
                ?>
            </ul>
        </nav>
        <div>
            <?php
                if(isset($_SESSION["userid"]))
                {
                    echo "<a class='logout' href='logout.php'><button>Log out</button></a>";
                }
                else
                {
                    echo "<a class='signin' href='signin.php'><button>Sign In</button></a>";
                    echo "<a class='signup' href='signup.php'><button>Sign Up</button></a>";
                }
                if(isset($_SESSION["userid"]) && $_SESSION["usertype"]==2)
                {
                    echo "<a class='signup' href='chatroom.php'><button>Contacter l'admin</button></a>";
                }
            ?>
            
            
            
        </div>
            
        
        
    </header>
