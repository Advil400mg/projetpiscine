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
        while ($medecin = $medecins->fetch_assoc()) {
            
        }


    ?>
    </center>
</div>






<?php
    include_once 'footer.php';
?>