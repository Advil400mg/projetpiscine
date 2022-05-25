<?php
    include 'header.php';
?>

<div class="wrapper">
<?php
    if(isset($_POST["medecin"]))
    {
        echo $_POST["id"];
    }
?>
</div>
<?php
    include_once "footer.php"; 
?>