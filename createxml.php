<?php

    

    if(!isset($_POST["xml"]))
    {
        header("location: search.php?error=formerror");
        exit();
    }
    include_once "header.php";

    $doctorid = $_POST["id"];
?>


<div class="wrapper">

<center>
        <form  method="post" action="createxmlphp.php" >

            <?php
                echo "<input type='hidden' name='id' value=".$doctorid.">";
            ?>


            <input type="text" placeholder="Formation suivie" name="form1" >
            <br>
            <input type="number" placeholder="Année d'obtention" name="ob1" >
            <br>
            <input type="text" placeholder="Formation suivie" name="form2" >
            <br>
            <input type="number" placeholder="Année d'obtention" name="ob2" >
            <br>
            <input type="text" placeholder="Expérience" name="ex1" >
            <br>
            <input type="number" placeholder="Durée" name="duree1" >
            <br>
            <input type="text" placeholder="Expérience" name="ex2" >
            <br>
            <input type="number" placeholder="Durée" name="duree2" >
            <br>
            <br>
            <button class='btnmedecin' type='submit' name ='cv'>Créer CV</button>
        </form>
    </center>


</div>


<?php

include_once "footer.php";

?>