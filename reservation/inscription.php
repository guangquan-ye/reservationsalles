<?php
try {
    //$pdo = new PDO("mysql:host=localhost;dbname=reservationsalles", "root", "root");
    $pdo = new PDO("mysql:host=localhost;dbname=guangquan-ye_reservationsalles", "shinz2", "zerty147!");
} catch (PDOException $e) {
    echo $e->getMessage();
}

include "connect.php";


$erreur = "";
$succes = "";
if (isset($_POST["inscription"])) {
    $login = $_POST["login"];
    $pass = $_POST["pass"];
    $repass = $_POST["confirm"];
    if (empty($login)) $erreur = "Login laissé vide!";
    elseif (empty($pass)) $erreur = "Mot de passe laissé vide!";
    elseif ($pass != $repass) $erreur = "Mots de passe non identiques!";
    else {

        $sel = $pdo->prepare("select login from utilisateurs where login=? limit 1");
        $sel->execute(array($login));
        $tab = $sel->fetchAll();
        if (count($tab) > 0)
            $erreur = "Login existe déjà!";
        else {
            $ins = $pdo->prepare("insert into utilisateurs(login,password) values(?,?)");
            if ($ins->execute(array($login, $pass)))

                $succes = "Compte créé !";
            header('Location: ' . "connexion.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="form.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

</head>

<body>
    <?php include "header.php" ?>


    <div class="main">
        <div class="formulaire">
            <form method="post">
                <h1>Pour vous inscrire</h1>
                <?php echo $erreur ?>
                <?php echo $succes ?>
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
                    <input type="password" name="pass" placeholder="Mot de passe">
                </div>
                <br>
                <div class="box">
                    <label>Confirmer mot de passe</label>
                    <br>
                    <input type="password" name="confirm" placeholder="Confirmer mot de passe">
                </div>
                <br>
                <div class="container">
                    <button type="submit" id="button" name="inscription">Inscription</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <?php include "footer.php" ?>
    </footer>

</body>

</html>