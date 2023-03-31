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
        } 
        ?>
    </body>
</html>