<?php
    ini_set('session.cache_limiter','public');
    session_cache_limiter(false);
    include_once 'header.php';

?>

<div class="wrapper">


    <form method ="POST">
        <div>
            <center>
            <input type= "text" name ="search" placeholder="Rechercher un nom une spécialité ou un établissement" autocomplete="off" >
            <button type= "submit" name = "submit">Rechercher</button>
            </center>
        </div>
    </form>
    


    <center>


<?php
    
    if(isset($_POST["submit"]))
    {
        
        require_once 'dbhandle.php';
        require_once 'fnc.php';
        $recherche = $_POST["search"];
        $data = searchBar($conn, $recherche);
        if($data !== false)
        {
            
            echo "<br><table class='blueTable' >";
            echo "<thead>";
            echo "<tr>";
            echo "<td>Prenom</td>";
            echo "<td>Nom</td>";
            echo "<td>Specialité</td>";
            echo "<td>Voir fiche</td>";
            echo "</tr>";
            echo "</thead><tbody>";
            while ($row = $data->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["surname"]."</td>";
                echo "<td>".$row["specialite"]."</td>";
                echo "<td>";
                echo "<form method='POST' action = 'doctorprofile.php'>";
                echo "<input type='hidden' name='id' value=".$row["userid"].">";
                echo "<button class='btnmedecin' type='submit' name ='medecin'>Voir</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            
            
        }
    }
?>

</center>

</div>
<?php
    include_once "footer.php"; 
?>