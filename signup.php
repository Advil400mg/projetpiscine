<?php
    include 'header.php';
?>

<section class="signup-form">
    <h2>Sign Up</h2>
    <form class="signup" action="signupphp.php" method="post">
        <input type="text" name="name" placeholder="Name...">
        <input type="text" name="surname" placeholder="Surname...">
        <input type="text" name="mail" placeholder="Email adress...">
        <input type="password" name="password" placeholder="Password...">
        <input type="password" name="passwordrpt" placeholder="Repeat password...">
        <button type="submit"name="submit">Submit</button>
    </form>
</section>