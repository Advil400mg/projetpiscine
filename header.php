<?php
    session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Test hébergement</title>
</head>
<body>
    <header>
        <img class="logo" src="img/logo.jpg" width = "120px" height = "48px" alt="logo">
        <nav>
            <ul class = "menu">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="">Tout Parcourir</a></li>
                <li><a href="">Recherche</a></li>
                <li><a href="">Rendez-vous</a></li>
                <?php
                    if(isset($_SESSION["userid"]))
                    {
                        echo "<li><a href=''>Votre Compte</a></li>";
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
            ?>
            
            
            
        </div>
            
        
        
    </header>