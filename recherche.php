
<?php
 include_once 'header.php';

$bdd = new PDO('mysql:host=localhost; dbname=examen;','root', '');
$allusers =0;
if(isset($_GET['s']) AND !empty($_GET['s']))
{
    $recherche = htmlspecialchars($_GET['s']);
    $allusers = $bdd->query('SELECT * FROM unioneuropeenne WHERE Pays LIKE "%'.$recherche.'%" ORDER BY ID DESC');
   
}
?>



<div class="wrapper">


    <form method ="GET">
        <div>
            <center>
        <input type= "search" name ="s" placeholder="Rechercher un nom une spécialité ou un établissement" autocomplete="off" >
        <a class="rechercher" href=""><button>Rechercher</button></a>
<!-- <a class="retour" href="header.php" onclick="index.php"><button>Retour</button></a> -->

</center>
</div>

</form>

<section class ="afficher_pays">



<?php
if(!empty($_GET['s']))
{
if($allusers->rowCount() > 0)
{
   
    while($users = $allusers->fetch())
    {
        ?>
        <center>
        <p><?= $users['Pays']; ?></p>
        </center>
        <?php
    }

}else{
    ?>
    <center>
    <p> Aucune recherche ne correspond </p>
</center>
    <?php
}

}

?>

</div>

</section>

<?php
    include_once "footer.php"; 
?>












