<?php
 
$msgp="";
include "connect.php";


if(isset($_POST['edit'])){
    $id=$_SESSION['userID'];
    $login=$_POST['login'];
    $pass=$_POST['pass'];
    $repass=$_POST['repass'];
        if(empty($login)){
            $msgp="Login laissé vide!";
        }
        elseif(empty($pass)){
            $msgp="Mot de passe laissé vide!";
        }
        elseif($pass!=$repass){ 
            $msgp= "Mots de passe non identiques!";
        }
    else{

    $update = "UPDATE utilisateurs SET login='$login', password='$pass' WHERE id=$id";
    $request = $mysqli->query($update);
    $msgp="Modification effectuer" ;
    }
}

    $request = $mysqli->query("SELECT * FROM utilisateurs WHERE id = $_SESSION[userID]");
    $result=$request->fetch_all();
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
    
    <title>Document</title>
</head>
<body>
    
    <?php include 'header.php' ?>
    <div class="main">
            <div class="formulaire">
                <form method="post">
                        <h1>Bienvenue <?php echo $_SESSION["user"] ?></h1>
                        <h2>Pour modifier votre profil</h2>
                    <div class="msg"><center><?php echo $msgp ?></center></div>
                    <div class="box">
                        <label for="prenom">Prenom</label>
                        <br>
                        <input type="text" name="login" value="<?php echo $result[0][1] ?>">
                    </div>
                    <br>
                    <div class="box">
                        <label for="mdp">Nouveau mot de passe</label>
                        <br>
                        <input type="password" name="pass" placeholder="Nouveau mot de passe">
                    </div>
                    <br>
                    <div class="box">
                        <label for="confirm">Confirmer le nouveau mot de passe</label>
                        <br>
                        <input type="password" name="repass" placeholder="Confirmer nouveau mot de passe">
                    </div>
                        <br>
                    <div class="button">
                        <button type="submit" id="button" name="edit">Modifier</button>
                    </div>
                </form>
            </div>

    </div>
    
</body>
</html>