<?php
    include_once 'header.php';
?>

<div class="wrapper">
    <div class="head">
        <h2>ROMANE</h2>
    </div>
    <section class="update-user-forms">
        <section class="update1-user-form">
            <form class="signin" action="signinphp.php" method="post">
                <?php
                    $infos = $_SESSION['all_infos'];
                    if(!empty($infos['adress1']))
                    {
                        echo "<input type='text' name='adress1' value=".$infos['adress1']." placeholder='Adress...'><br>";
                    }
                    else
                    {
                        echo "<input type='text' name='adress1' placeholder='Adress...'><br>";
                    }
                    if(!empty($infos['adress2']))
                    {
                        echo "<input type='text' name='adress2' value=".$infos['adress2']." pplaceholder='Adress...'><br>";
                    }
                    else
                    {
                        echo "<input type='text' name='adress2' placeholder='Adress...'><br>";
                    }
                    if(!empty($infos['city']))
                    {
                        echo "<input type='text' name='city' value=".$infos['city']." placeholder='City...'><br>";
                    }
                    else
                    {
                        echo "<input type='text' name='city' placeholder='City...'><br>";
                    }
                    if(!empty($infos['ZIP']))
                    {
                        echo "<input type='text' name='ZIP' value=".$infos['ZIP']." placeholder='ZIP...'><br>";
                    }
                    else
                    {
                        echo "<input type='text' name='ZIP' placeholder='ZIP...'><br>";
                    }
                    if(!empty($infos['country']))
                    {
                        echo "<input type='text' name='country' value=".$infos['country']." placeholder='Country...'><br>";
                    }
                    else
                    {
                        echo "<input type='text' name='country' placeholder='Country...'><br>";
                    }
                    if(!empty($infos['phone']))
                    {
                        echo "<input type='tel' name='phone' value=".$infos['phone']." placeholder='Phone number...'><br>";
                    }
                    else
                    {
                        echo "<input type='tel' name='phone' placeholder='Phone number...'><br>";
                    }
                    if(!empty($infos['img']))
                    {
                        echo "<input type='file' name='img' value=".$infos['img']." placeholder='Password...'><br>";
                    }
                    else
                    {
                        echo "<input type='file' name='img' placeholder='Password...'><br>";
                    }
                ?>
                <button type='submit'name='update'>Update</button>
            </form>
        </section><br>

        <section class="update-user-password-form">
            <form class="signin" action="signinphp.php" method="post">
                <input type='text' name='adress1' placeholder='Adress...'><br>
                <input type='password' name='adress2' placeholder='Adress...'><br>
                <button type="submit"name="update">Change password</button>
            </form>
        </section>
    </section>

</div>

<?php

    include_once 'footer.php';

?>