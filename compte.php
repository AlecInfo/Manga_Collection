<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$pseudo = "";
$email = "";
$pwd = "";

if (selectUser($_SESSION["login"])) {
    $reponse = selectUser($_SESSION["login"]);
    $pseudo = $reponse[1];
    $pwd = $reponse[2];
    $email = $reponse[3];
}

$envoie = filter_input(INPUT_POST, "envoyer");

if (!empty($envoie)) {
    $_SESSION["idUser"] = $reponse[0];
    header("location: ./editerUser.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Mon compte</title>
</head>
<body>
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
        <h1>Manga collection</h1>
    </header>
    <main>
        <h2>Informations du compte</h2>
        <table class="tableCompte">
            <tbody>
                <tr>
                    <td>Pseudo: </td>
                    <td><?=$pseudo?></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><?=$email?></td>
                </tr>
                <tr>
                    <td>Mot de passe: </td>
                    <td><?=decrypter($pwd, key_CrypDecryp())?></td>
                </tr>
            </tbody>
        </table>

        <form action="" method="post" name="compte">
            <input type="submit" value="Modifier le compte" name="envoyer">
        </form>
        <a href="deconnection.php" id="deconnection">deconnection</a>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>