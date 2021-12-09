<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

if (!empty($_GET["id"])) {
    $getIdUser = $_GET["id"];
}
elseif (isset($_SESSION["idUser"]) && !empty($_SESSION["idUser"])) {
    $getIdUser = $_SESSION["idUser"];
}


$getInfoUser = selectUserById($getIdUser);

$pseudo = $getInfoUser[1];
$mdp = decrypter($getInfoUser[2], key_CrypDecryp());
$email = $getInfoUser[3];

$envoie = filter_input(INPUT_POST, "envoyer");

if (!empty($envoie)) {
    $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $mdp = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_STRING);

    if (!empty($pseudo) && !empty($email) && !empty($mdp)) {
        $message = "";
        $_SESSION["editionUser"] = $pseudo;
        modifieUser($getIdUser, $pseudo, crypter($mdp, key_CrypDecryp()), $email);

        if (!empty($_GET["id"])) {
            header("location: ./gestionUtilisateurs.php");
            exit;
        }
        elseif (isset($_SESSION["idUser"]) && !empty($_SESSION["idUser"])) {
            header("location: ./compte.php");
            exit;
        }
    }
    else {
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
    <title>Editer un profil</title>
</head>
<body>
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
        <h1>Manga collection</h1>
    </header>
    <main>
        <h2>Modifier un utilisateur</h2>
        <h4 class="error"> 
            <?php if (!empty($message)) echo $message;?>
        </h4>
        <form action="" method="post">
            <label for="pseudo">Pseudo :</label><br>
            <input type="text" name="pseudo" id="pseudo" placeholder="Entrer un pseudo" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($pseudo)) echo 'value='.$pseudo ?>><br><br>
            <label for="pwd">Email :</label><br>
            <input type="email" name="email" id="email" placeholder="Entrer un email" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($email)) echo 'value='.$email ?>><br><br>
            <label for="pwd">Mot de passe :</label><br>
            <input type="text" name="pwd" id="pwd" placeholder="Entrer un Mot de passe" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($mdp)) echo 'value='.$mdp ?>><br><br>
            <input type="submit" value="Modifier" name="envoyer">
        </form>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>