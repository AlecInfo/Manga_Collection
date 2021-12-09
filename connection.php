<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php";


$pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
$pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_STRING);
$envoie = filter_input(INPUT_POST, "envoyer");
$message = "";

if (!empty($envoie)) {

    if (!empty($pseudo) && !empty($pwd)) {

        $reponse = connectionSite($pseudo); 

        if (!empty($reponse)) {

            if (decrypter($reponse[0], key_CrypDecryp())  == $pwd) {

                $message = "";
                $_SESSION["login"] = $pseudo;
                $_SESSION["pseudo"] = $pseudo;
                $_SESSION["connection"] = "true";
                header("location: ./index.php");
                exit;
            }
            else{
                $message = "Le mot de passe ou l'identifiant est inccorect.";
            }
        }
        else {
            $message = "Veuillez vous inscrire si ce n'est pas déjà fait !";
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
    <title>Connection</title>
</head>
<body class="pageConnection">
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
            <h2>Connection</h2>
            <h4 class="error"> 
                <?php if (!empty($message)) echo $message;?>
            </h4>
            <form action="" method="post">
                <label for="pseudo">Pseudo :</label><br>
                <input type="text" name="pseudo" id="pseudo" placeholder="Entrer un pseudo" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($pseudo)) echo 'value='.$pseudo ?>><br><br>
                <label for="pwd">Mot de passe :</label><br>
                <input type="password" name="pwd" id="pwd" placeholder="Entrer un Mot de passe" <?php if (!empty($message)) echo 'class="errorInput"'?>><br><br>
                <input type="submit" value="Se Connecter" name="envoyer">
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