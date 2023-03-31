<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include './static/css/style.php'; ?>
        </style>
    </head>
    <body>
        <h1>Bienvenue sur mon site</h1>

        <?php
            if(!isLoggedIn()){
        ?>

        <div id="connect_box">
            <h3>Veuillez vous connecter</h3>
            <form method="POST", >
                <label for="pseudo">Email</label>
                <input type="text" id="email" name="email"/><br/>
                <label for="password">Password</label>
                <input type="password" id="password" name="password"><br/>
                <input type="submit" value="Submit">
            </form>
        </div>

        <?php
        } else {
            echo '<h3>' . $_SESSION['message'] .'</h3>';
        ?>
            <a href="logout" class="button">Logout</a>

        <?php
        }

        ?>
    </body>
</html>