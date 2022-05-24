<?php
    include 'header.php';
?>

<div class="wrapper">
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

</div>

  

<?php
    include_once "footer.php"; 
?>