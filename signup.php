<?php
    include 'header.php';
?>

<div class="wrapper">
    <div class="head">
        <h2>Sign Up</h2>
    </div>
    <section class="signup-form">
        
        <form class="signup" action="signupphp.php" method="post">
            <input type="text" name="name" placeholder="Name...">
            <input type="text" name="surname" placeholder="Surname...">
            <input type="text" name="mail" placeholder="Email adress...">
            <input type="password" name="password" placeholder="Password...">
            <input type="password" name="passwordrpt" placeholder="Repeat password...">
            

            <button type="submit"name="submit">Submit</button>
        </form>
    

<?php
if(isset($_GET["error"]))
{
    if($_GET["error"] == "none")
    {
        echo("<p>You have signed up successfully</p>");
    }
}
?>
</section>
</div>
<?php
    include_once "footer.php"; 
?>
