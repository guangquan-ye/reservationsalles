<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="footer.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <div class="fondconn">

        <?php include "header.php" ?>
        <div class="main">
            <div class="formulaire">
                <form method="post">
                    <h1>Connexion</h1>
                    <div class="msg">
                        <center><?php echo $msg ?></center>
                    </div>
                    <br>
                    <div class="box">
                        <label>Login</label>
                        <br>
                        <input type="text" name="login" placeholder="Login">
                    </div>
                    <br>
                    <div class="box">
                        <label>Mot de passe</label>
                        <br>
                        <input type="password" name="password" placeholder="Mot de passe">
                    </div>
                    <br>
                    <div class="container">
                        <button id="button" type="submit" name="submit">Connexion</button>
                    </div>
                    <br>
                    <span><a href="inscription.php">Pas encore inscrit ?</a></span>
                </form>
            </div>
        </div>
        <footer>
            <?php include "footer.php" ?>
        </footer>
    </div>
</body>

</html>