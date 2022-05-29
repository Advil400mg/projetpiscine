<?php
    ini_set('session.cache_limiter','public');
    session_cache_limiter(false);
    include 'header.php';
?>

<div class="wrapper">
<center>
<?php
    if(!isset($_POST["medecin"]))
    {
        header("location : searchbar.php?error=doctorNotFound");
        exit();
    }
    require_once 'dbhandle.php';
    require_once 'fnc.php';
    $doctoruserid = $_POST["id"];
    $data = checkDoctor($conn, $doctoruserid);
    $row = $data->fetch_assoc();
    $doctorid = $row["medecinid"];
    
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
    <br>
    <table class="blueTable">
        <tbody>
            <tr>
                <td>
                    <form method="POST" action="rdv.php">
                        <?php
                            echo "<input type='hidden' name='id' value=".$doctoruserid.">";
                            echo "<button class='btnmedecin' type='submit' name ='rdv'>Prendre un RDV</button>";
                        ?>
                    </form>
                </td>
                <td>
                    <form method="POST" action="chatroom.php">
                        <?php
                            echo "<input type='hidden' name='id' value=".$doctoruserid.">";
                            if(isset($_SESSION["usertype"]) && $_SESSION["usertype"]!=2)
                            {
                                echo "<button class='btnmedecin' type='submit' name ='chat'>Chat</button>";
                            }
                            else
                            {
                                echo "<button class='btnmedecin' type='submit' name ='chat' disabled>Chat</button>";
                            }
                            
                        ?>
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <?php
                            echo "<input type='hidden' name='id' value=".$doctoruserid.">";
                            echo "<button class='btnmedecin' type='submit' name ='rdv'>Voir son CV</button>";
                        ?>
                    </form>
                </td>
                <?php
                if(isset($_SESSION["usertype"]) && $_SESSION["usertype"]==3)
                {
                    echo "<td>";
                    echo "<form method='POST' action='ajoutdispo.php'>";
                        echo "<input type='hidden' name='id' value=".$doctorid.">";
                        echo "<button class='btnmedecin' type='submit' name ='rdv'>Ajouter disponibilités</button>";
                    echo "</form>";
                    echo "</td>";

                }
                ?>
            </tr>
        </tbody>
    </table>
</center>



</div>
<?php
    include_once "footer.php"; 
    
?>