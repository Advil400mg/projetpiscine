<?php
    ini_set('session.cache_limiter','public');
    session_cache_limiter(false);
    include 'header.php';
?>

<div class="wrapper">
<center>
<?php
    if(!isset($_POST["rdv"]))
    {
        header("location: searchbar.php?error=doctorNotFound");
        exit();
    }
    require_once 'dbhandle.php';
    require_once 'fnc.php';
    $doctoruserid = $_POST["id"];
    $data = checkDoctor($conn, $doctoruserid);
    $row = $data->fetch_assoc();
    
    echo "<br><table class='blueTable' >";
    echo "<thead>";
    echo "<tr>";
    echo "<td></td>";
    echo "<td>Prenom</td>";
    echo "<td>Nom</td>";
    echo "<td>Specialité</td>";
    echo "</tr>";
    echo "</thead><tbody>";
    echo "<tr>";
    if(empty($row["img"]))
    {
        echo "<td><img src='img/default-user.png' border='1px solid #9FC6FF' height='70px' width='70px'></td>";
    }
    else
    {
        echo "<td><img src='".$row['img']."' height='70px' width='70px' border='1px solid #9FC6FF' border-radius='20px 0'></td>";
    }
    
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["surname"]."</td>";
    echo "<td>".$row["specialite"]."</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";

?>
</center>
<center>
<?php

    $doctorid = $row['medecinid'];
    $dates = getDates($conn, $doctorid);
    //echo date("l jS \of F") . "<br>";
    echo "<br><br><table class='blueTable' >";
    echo "<thead>";
    echo "<tr>";
    echo "<td>Date</td>";
    echo "<td>Heures</td>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $dates->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
        $heures = getHours($conn, $doctorid, $row['date']);
        while ($col = $heures->fetch_assoc())
        {
            echo "<td>";
            echo "<form method='POST' action = 'rdvphp.php'>";
            if(!$col['taken'])
            {
                echo "<input type='hidden' name='id' value=".$col["creneauid"].">";
                echo "<button class='btnmedecin' type='submit' name ='medecin'>".$col['heuredebut']."</button>";
            }
            
            echo "</form>";
            echo "</td>";
        }

        echo "</tr>";
    }


    echo "</tbody>";
    echo "</table>";
?>
</center>
</div>

<?php
    include_once "footer.php"; 
?>