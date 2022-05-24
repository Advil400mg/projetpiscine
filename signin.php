<?php
    include 'header.php';
?>

<div class="wrapper">
    <div class="head">
        <h2>Sign In</h2>
    </div>
    <section class="signin-form">
        <form class="signin" action="signinphp.php" method="post">
            <input type="text" name="mail" placeholder="Email adress..."><br>
            <input type="password" name="password" placeholder="Password...">
            <button type="submit"name="submit">Sign In</button>
        </form>
    </section>
</div>

<?php
    include_once "footer.php"; 
?>