<?php
include "connect.php";

$planningrequest = "SELECT reservations.titre, reservations.description, DATE_FORMAT(reservations.debut, '%d %M %Y %H:%i') as debut, DATE_FORMAT(reservations.fin, '%d %M %Y %H:%i') as fin , id FROM reservations";
$requestp = $mysqli->query($planningrequest);
$resultp = $requestp->fetch_all();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Planning</title>
</head>

<body>
    <header>
        <?php include "header.php" ?>
    </header>

    <div class="main">
        <section>


            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <th></th>
                        <?php
                        $date = new DateTime("midnight + 8 hours", new DateTimeZone("Europe/Paris"));

                        for ($x = 0; $x < 7; $x++) {

                            echo "<th>" . $date->format("D j M") . "</th>";

                            $date->modify("next day");
                        }
                        for ($x = 0; $x < 11; $x++) {

                            echo "<tr>";

                            echo "<td>" . $date->format("H") . "</td>";

                            for ($i = 0; $i < 7; $i++) {
                                $date = new DateTime("midnight + 9 hours + $x hours + $i days");

                                echo '<td>';
                                $reserved = false;
                                for ($j = 0; isset($resultp[$j]); $j++) {


                                    $debut = $resultp[$j][2];
                                    $fin = $resultp[$j][3];
                                    $debut1 = new DateTime($debut);
                                    $fin1 = new DateTime($fin);

                                    if ($date->format("D j M H") >= $debut1->format("D j M H") && $date->format("D j M H") <= $fin1->format("D j M H")) {
                                        echo "<a href='reservation.php?id=" . $resultp[$j][4] . "'>"  .  $resultp[$j][0]  . "<br>" . $resultp[$j][1] . "</a>";

                                        $reserved = true;
                                    }
                                }
                                if ($reserved) {
                                    echo "</td>";
                                } else {
                                    echo "<a href='reservation-form.php?date=" . $date->format('Y-m-d') . "&debut=" . $date->format('H') . "'>Reserver</a>";
                                }
                            }
                            echo "</tr>";
                            // $date->modify("next day");
                        }
                        ?>
                    </thead>
                </table> <a href="reservation.php"></a>
        </section>
    </div>

    <footer>
        <?php include "footer.php" ?>
    </footer>
</body>

</html>