<?php
    ini_set('session.cache_limiter','public');
    session_cache_limiter(false);
    include 'header.php';
?>

<div class="wrapper">

<center>
    <form method ="POST">
        <table class="blueTable">
            <tr>
                <td><button type= "submit" name = "a">Médecine Générale</button></td>
                <td><button type= "submit" name = "b">Spécialistes</button></td>
                <td><button type= "submit" name = "c">Laboratoire</button></td>
            </tr>
        </table>
    </form>
    


    


<?php
    
    if(isset($_POST["a"]))
    {
        
        require_once 'dbhandle.php';
        require_once 'fnc.php';
        $data = searchA($conn);
        if($data !== false)
        {
            
            echo "<br><table class='blueTable' >";
            echo "<thead>";
            echo "<tr>";
            echo "<td></td>";
            echo "<td>Prenom</td>";
            echo "<td>Nom</td>";
            echo "<td>Specialité</td>";
            echo "<td>Voir fiche</td>";
            echo "</tr>";
            echo "</thead><tbody>";
            while ($row = $data->fetch_assoc()) {
                echo "<tr>";
                if(empty($row["img"]))
                {
                    echo "<td><img src='img/default-user.png' height='70px' width='70px'></td>";
                }//border='1px solid #9FC6FF'
                else
                {
                    echo "<td><img src='".$row['img']."' height='70px' width='70px' border='1px solid #9FC6FF' border-radius='20px 0'></td>";
                }
                
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
    else if(isset($_POST["b"]))
    {
        
        require_once 'dbhandle.php';
        require_once 'fnc.php';
        $data = searchB($conn);
        if($data !== false)
        {
            
            echo "<br><table class='blueTable' >";
            echo "<thead>";
            echo "<tr>";
            echo "<td></td>";
            echo "<td>Prenom</td>";
            echo "<td>Nom</td>";
            echo "<td>Specialité</td>";
            echo "<td>Voir fiche</td>";
            echo "</tr>";
            echo "</thead><tbody>";
            while ($row = $data->fetch_assoc()) {
                echo "<tr>";
                if(empty($row["img"]))
                {
                    echo "<td><img src='img/default-user.png' height='70px' width='70px'></td>";
                }//border='1px solid #9FC6FF'
                else
                {
                    echo "<td><img src='".$row['img']."' height='70px' width='70px' border='1px solid #9FC6FF' border-radius='20px 0'></td>";
                }
                
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
    else if(isset($_POST["c"]))
    {
        
        require_once 'dbhandle.php';
        require_once 'fnc.php';
        $data = searchC($conn);
        if($data !== false)
        {
            
            echo "<br><table class='blueTable' >";
            echo "<thead>";
            echo "<tr>";
            echo "<td></td>";
            echo "<td>Prenom</td>";
            echo "<td>Nom</td>";
            echo "<td>Specialité</td>";
            echo "<td>Voir fiche</td>";
            echo "</tr>";
            echo "</thead><tbody>";
            while ($row = $data->fetch_assoc()) {
                echo "<tr>";
                if(empty($row["img"]))
                {
                    echo "<td><img src='img/default-user.png' height='70px' width='70px'></td>";
                }//border='1px solid #9FC6FF'
                else
                {
                    echo "<td><img src='".$row['img']."' height='70px' width='70px' border='1px solid #9FC6FF' border-radius='20px 0'></td>";
                }
                
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

  

<?php
    include_once "footer.php"; 
?>