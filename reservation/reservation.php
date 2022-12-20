<?php

include "connect.php";
if (isset($_GET['id'])) {

    $_SESSION['eventID'] = $_GET['id'];
    $request_event = "SELECT * FROM reservations 
INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id
WHERE reservations.id = '$_GET[id]'";
    $query_event = $mysqli->query($request_event);
    $result_event = $query_event->fetch_all();
}


for ($i = 0; isset($resultresa[$i]); $i++) {

    for ($j = 0; isset($resultresa[$i][$j]); $j++) {
        echo ($resultresa[$i][$j]) . "<br>";
    }
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
    <?php if (isset($_SESSION['userID']) && isset($_GET['id'])) : ?>
        <div class="main">

            <form class="formulaire">
                <div class="box">



                    <h1><?= $result_event[0][1] ?></h1>

                    <h2> Créé par : <br> <?= $result_event[0][7] ?> </h2>

                    <h2>Description :</h2>
                    <p> <?= $result_event[0][2] ?> </p>

                    <h2>Date de debut :</h2>
                    <p> <?= $result_event[0][3] ?> </p>

                    <h2>Date de fin :</h2>
                    <p> <?= $result_event[0][4] ?> </p>
                <?php endif ?>

                </div>
        </div>
        </div>

        <footer>
            <?php include "footer.php" ?>
        </footer>


</body>

</html>