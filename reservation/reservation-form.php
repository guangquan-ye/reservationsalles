<?php

include "connect.php";



if (isset($_POST["resa"])) {

    $id = $_SESSION["userID"];
    $titre = $_POST["titre"];
    $descrip = $_POST["descrip"];
    $debut = $_POST["date"] . " " . $_POST["debut"];
    $fin = $_POST["date"] . " " . $_POST["fin"];
    $description = mysqli_real_escape_string($mysqli, $descrip);

    // $verify = 'SELECT debut , fin FROM reservations';  
    // $requestdispo=$mysqli->query($verify);
    // $dispo=$requestdispo->fetch_all();

    $request = "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('$titre', '$description', '$debut', '$fin', $id)";
    $result = $mysqli->query($request);
    header('Location: ' . "planning.php");
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="footer.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
</head>

<body>
    <header>
        <?php include "header.php" ?>
    </header>
    <div class="main">

        <div class="formulaire">
            <form method="post">
                <h1>Pour reserver</h1>
                <?php if (isset($_SESSION["userID"])) : ?>
                    <h2>Utilisateur : <?php echo $id = $_SESSION["user"] ?></h2>
                    <div class="box">
                        <label>Titre</label>
                        <br>
                        <input type="text" name="titre" placeholder="Titre">
                    </div>
                    <br>
                    <div class="box">
                        <label>Description</label>
                        <br>
                        <input type="text" name="descrip" placeholder="Description">
                    </div>
                    <br>
                    <div class="box">
                        <label>Debut</label>
                        <select name="debut">
                            <option value="08:00:00">8h</option>
                            <option value="09:00:00">09h</option>
                            <option value="10:00:00">10h</option>
                            <option value="11:00:00">11h</option>
                            <option value="12:00:00">12h</option>
                            <option value="13:00:00">13h</option>
                            <option value="14:00:00">14h</option>
                            <option value="15:00:00">15h</option>
                            <option value="16:00:00">16h</option>
                            <option value="17:00:00">17h</option>
                            <option value="18:00:00">18h</option>
                        </select>
                    </div>
                    <br>
                    <div class="box">
                        <label>Fin</label>
                        <select name="fin">
                            <option value="09:00:00">9h</option>
                            <option value="10:00:00">10h</option>
                            <option value="11:00:00">11h</option>
                            <option value="12:00:00">12h</option>
                            <option value="13:00:00">13h</option>
                            <option value="14:00:00">14h</option>
                            <option value="15:00:00">15h</option>
                            <option value="16:00:00">16h</option>
                            <option value="17:00:00">17h</option>
                            <option value="18:00:00">18h</option>
                            <option value="19:00:00">19h</option>
                        </select>
                    </div>
                    <br>
                    <div class="box">
                        <label>Date</label>
                        <br>
                        <input type="date" name="date">
                    </div>
                    <br>
                    <div class="container">
                        <button type="submit" id="button" name="resa">Reserver</button>
                    </div>
        </div>
        </form>
    <?php else : ?>
        <a href="connexion.php">
            <h2>Connectez vous pour vous inscrire</h2>
        </a>
    <?php endif ?>
    <br>


    </div>
    </div>

    <footer>
        <?php include "footer.php" ?>
    </footer>


</body>

</html>