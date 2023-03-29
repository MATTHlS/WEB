<?php
session_start();
require "/var/www/monsite.fr/app/controllers/Users.php";
/*
if(empty($_POST['submit'])){
    $users = new Users();
    $users->login();
}*/
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/var/www/monsite.fr/public/static/css/style.css">
    </head>
    <body>
        <h1>Bienvenue sur mon site</h1>

        <?php
            if(empty($_SESSION['username'])){
        ?>

        <div id="register_box">
            <h3>Veuillez vous enregistrer</h3>
            <form method="POST", >
                <label for="pseudo">Username</label>
                <input type="text" id="username" name="username"/><br/>
                <label for="pseudo">Email</label>
                <input type="text" id="email" name="email"/><br/>
                <label for="password">Password</label>
                <input type="password" id="password" name="password"><br/>
                <label for="password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password"><br/>
                <input type="submit" value="Submit">
            </form>
        </div>

        <?php
        } else {
            session_start();
            echo '<h3>' . $_SESSION['message'] .'</h3>';
        ?>
            <a href="logout.php" class="button">Logout</a>

        <?php
        }

        ?>
    </body>
</html>