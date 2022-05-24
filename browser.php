<?php
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="styles1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
</head>
<body>
    <div class="container">
        <div class="container-onglets">
            <div class="onglets active" data-anim="1">Médecine générale</div>
            <div class="onglets" data-anim="2">Médecins spécialistes</div>
            <div class="onglets" data-anim="3">Laboratoire et biologie médicale</div>
        </div>

        <div class="contenu activeContenu" data-anim="1">
        <h3>Lorem ipsum dolor sit amet.1</h3>
        <hr>
        <p>orem ipsum dolor sit amet bla bla bla bla bla</p>
        </div>

        <div class="contenu activeContenu" data-anim="2">
        <h3>Lorem ipsum dolor sit amet.2</h3>
        <hr>
        <p>orem ipsum dolor sit amet bla bla bla bla bla</p>
        </div>

        <div class="contenu activeContenu" data-anim="3">
        <h3>Lorem ipsum dolor sit amet.3</h3>
        <hr>
        <p>orem ipsum dolor sit amet bla bla bla bla bla</p>
        </div>

    </div>

    <script src="app.js"></script>
</body>


  

<?php
    include_once "footer.php"; 
?>