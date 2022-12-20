<?php
include "connect.php";
if (isset($_GET['deconnexion'])) {
    session_destroy();
    header('Location:' . "connexion.php");
    exit();
}
?>

<header>
    <nav>
        <div class="items">
            <ul>

                <?php if (isset($_SESSION["user"])) : ?>
                    <div class="ifco">
                        <div class="msgheader">
                            <li>Bonjour <?php echo $_SESSION["user"] ?>
                        </div>
                        <div class="liheader">
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="planning.php">Planning</a></li>
                            <li><a href="reservation-form.php">Reservation</a></li>
                            <li><a href="profil.php">Profil</a></li>
                            <li><a href="?deconnexion=1">Deconnexion</a></li>
                        </div>
                    </div>
                    </form>

                <?php else : ?>
                    <div class="li2header">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="planning.php">Planning</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                    </div>
                <?php endif ?>
            </ul>
        </div>
    </nav>
</header>