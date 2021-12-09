<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

// recuperation des donnes du manga
$getIdManga = $_GET["id"];
$getInfoManga = selectMangaById($getIdManga);

$idManga = $getInfoManga[0];
$titreManga = $getInfoManga[1];




$envoie = filter_input(INPUT_POST, "envoyer");
$message = "";


if (!empty($envoie) && !empty($envoie) && !empty($envoie) && !empty($envoie) && !empty($envoie))  {
    
    $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
    // recuperation du nombre de volume
    $volume = nbVolumeById($idManga) + 1;

    $dateSortie = filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);
    $img = filter_input(INPUT_POST, "img", FILTER_SANITIZE_STRING);
    $imgBack = $img;
    $img = $img.$volume.".jpg";
    $nbPage = filter_input(INPUT_POST, "nbPage", FILTER_VALIDATE_INT);

    $maisonEditionId = selectMaisonByName($maisonEdition);

    if (!empty($titre)) {
        if (ajoutVolume($idManga, $titre, $volume, $img, $nbPage, $dateSortie)) {
            $message = "";
            $_SESSION["nbVolume"] = $volume;
            header("location: ./editerManga.php?id=$idManga");
            exit;
        }
        else {
            $message = "Le volume n'a pas pu etre ajouter !";
        }
    }
    else {
        $message = "Veuillez entrer un titre !";
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
    <title>Ajouter un volume</title>
</head>
<body>
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
        <h1>Manga collection</h1>
    </header>
    <main>
        <h2>Ajouter un Volume a <?=$titreManga?></h2>
        <h4 class="error"> 
            <?php if (!empty($message)) echo $message;?>
        </h4>
        <form action="" method="post">
            <label for="titre">Titre* :</label><br>
            <input type="text" name="titre" id="titre" placeholder="Entrer un titre" <?php if (!empty($message)) echo 'class="errorInput"'?> value='<?php if (!empty($titre)) echo $titre ?>'><br><br>
            
            <label for="date">Date de sortie (YYYY/MM/JJ) :</label><br>
            <input type="text" name="date" id="date" placeholder="Entrer une date" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($dateSortie)) echo 'value='.$dateSortie ?>><br><br>
            
            <label for="img">Image :</label><br>
            <input type="text" name="img" id="img" placeholder="Entrer le nom et l'extention" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($imgBack)) echo 'value='.$imgBack ?>><br><br>
                       
            <label for="nbPage">Nombre de page :</label><br>
            <input type="number" name="nbPage" id="nbPage" placeholder="Entrer la nombre de page" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($nbPage)) echo 'value='.$nbPage ?>><br><br>
   
            <input type="submit" value="Ajouter" name="envoyer">
        </form>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>