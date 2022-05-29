<?php

    if(!isset($_POST["showcv"]))
    {
        header("location: search.php?error=formerror");
        exit();
    }
    include_once "header.php";

    $doctorid = $_POST["id"];
    $path = "xml/".$doctorid.".xml";


    if(!file_exists($path))
    {
        header("location: search.php?error=noCV"); 
        exit();

    }
    $contenu = simplexml_load_file($path); 
    echo $contenu->info->ob1;
?>




<div class="wrapper">
    <center>
        <h1>Formations et expériences</h1><br>
        <table class="blueTable">
            <thead>
                <td>Formation</td>
                <td>Date d'obtention</td>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $contenu->info->form1; ?></td>
                    <td><?php echo $contenu->info->ob1; ?></td>
                </tr>
                <tr>
                    <td><?php echo $contenu->info->form2; ?></td>
                    <td><?php echo $contenu->info->ob2; ?></td>
                </tr>
            </tbody>

            <thead>
                <td>Expérience</td>
                <td>Durée</td>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $contenu->info->ex1; ?></td>
                    <td><?php echo $contenu->info->duree1; ?></td>
                </tr>
                <tr>
                    <td><?php echo $contenu->info->ex2; ?></td>
                    <td><?php echo $contenu->info->duree2; ?></td>
                </tr>
            </tbody>
        </table>
    </center>

</div>




<?php
    include_once "footer.php";
?>