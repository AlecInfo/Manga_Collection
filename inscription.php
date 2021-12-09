<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php";



$pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_STRING);
$pwdVerrif = filter_input(INPUT_POST, "pwdVerrif", FILTER_SANITIZE_STRING);
$envoie = filter_input(INPUT_POST, "envoyer");
$message = "";

if (!empty($envoie)) {

    if (!empty($pseudo) && !empty($pwd) && !empty($pwdVerrif) && !empty($email)) {

        if ($pwd == $pwdVerrif) {

            $reponse = userExist($pseudo);
            $pwdCypte = crypter($pwd, key_CrypDecryp());

            if (empty($reponse)) {

                if (ajoutUser($pseudo, $pwdCypte, $email)) {

                    $message = "";
                    $_SESSION["login"] = $pseudo;
                    $_SESSION["pseudo"] = $pseudo;
                    $_SESSION["connection"] = "true";
                    header("location: ./index.php");
                    exit;
                }else {
                    $message = "Vous n'avez pas pu vous inscrire !";
                } 
            }
            else{
                $message = "Le compte existe déjà !";
            }
        }
        else {
            $message = "Le Mot de passe de correspond pas !";
        }
    }else {
        $message = "Veuillez remplir les champs !";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Inscription</title>
</head>
<body class="pageInscription">
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
        <h1>Manga collection</h1>
    </header>
    <main>
        <?php
        if (empty($message) || $message != "Bienvenu !") {
            ?>
            <h2>Inscription</h2>
            <h4 class="error"> 
                <?php if (!empty($message)) echo $message;?>
            </h4>
            <form action="" method="post">
                <label for="pseudo">Pseudo* :</label><br>
                <input type="text" name="pseudo" id="pseudo" placeholder="Entrer un pseudo" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($pseudo)) echo 'value='.$pseudo ?>><br><br>
                <label for="pwd">Email* :</label><br>
                <input type="email" name="email" id="email" placeholder="Entrer un email" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($email)) echo 'value='.$email ?>><br><br>
                <label for="pwd">Mot de passe* :</label><br>
                <input type="password" name="pwd" id="pwd" placeholder="Entrer un Mot de passe" <?php if (!empty($message)) echo 'class="errorInput"'?>><br><br>
                <label for="pwd">Conffirmer le Mot de passe* :</label><br>
                <input type="password" name="pwdVerrif" id="pwd" placeholder="Entrer un Mot de passe" <?php if (!empty($message)) echo 'class="errorInput"'?>><br>
                <input type="submit" value="S'Inscrire" name="envoyer">
            </form>
            <?php
        }elseif ($message == "Bienvenu !") {
            ?>
            <h2 class="error"><?=$message?></h2>
            <?php
        }
        ?>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>