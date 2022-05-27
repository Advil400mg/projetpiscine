<?php
    include_once 'header.php';
?>



<div class="wrapper">
    <center>
    <?php
        require_once 'dbhandle.php';
        require_once 'fnc.php';
        if($_SESSION["usertype"]==1)
        {
            $medecins = medecinList($conn);
        }
        while ($medecin = $medecins->fetch_assoc()) 
        {
            $medecinrow = checkDoctor($conn, $medecin["userid"])->fetch_assoc();
            echo "<br><table class='blueTable' >";
            echo "<thead>";
            echo "<tr>";
            echo "<td width='150px'></td>";
            echo "<td width='150px'>Prenom</td>";
            echo "<td width='150px'>Nom</td>";
            echo "<td width='150px'>Specialité</td>";
            echo "</tr>";
            echo "</thead><tbody>";
            echo "<tr>";
            if(empty($medecinrow["img"]))
            {
                echo "<td><img src='img/default-user.png' border='1px solid #9FC6FF' height='70px' width='70px'></td>";
            }
            else
            {
                echo "<td><img src='".$medecinrow['img']."' height='70px' width='70px' border='1px solid #9FC6FF' border-radius='20px 0'></td>";
            }
            
            echo "<td>".$medecinrow["name"]."</td>";
            echo "<td>".$medecinrow["surname"]."</td>";
            echo "<td>".$medecinrow["specialite"]."</td>";
            echo "</tr>";


            $dates = getRdvDates($conn, $medecin["medecinid"]);
            //echo date("l jS \of F") . "<br>";

            echo "<tr><td></td></tr><tr><td></td></tr><tr>";
            echo "<td>Date</td>";
            echo "<td>Heures</td>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $dates->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['date']."</td>";
                $heures = getRdvHours($conn, $medecin["medecinid"], $row['date']);
                while ($col = $heures->fetch_assoc())
                {
                    echo "<td>";
                    echo "<form method='POST' action = 'deleterdv.php'>";
                    if($col['taken'])
                    {
                        echo "<input type='hidden' name='id' value=".$col["creneauid"].">";
                        echo "<label>".$col['heuredebut']."</label>";
                        echo "<button class='btncancel' type='submit' name ='medecin' margin-left='10px'>Annuler</button>";
                    }
                    
                    echo "</form>";
                    echo "</td>";
                }

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        }


    ?>
    </center>
</div>






<?php
    include_once 'footer.php';
?>