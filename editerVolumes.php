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
$getIdManga = $_GET["idManga"];
$getInfoManga = selectMangaById($getIdManga);

$idManga = $getInfoManga[0];
$titreManga = $getInfoManga[1];


// recuperation des donnes du volume
$getIdVolume = $_GET["idVolume"];
$getInfoVolume = selectVolumes($getIdVolume)[0];

$titre = $getInfoVolume[2];
$volume = $getInfoVolume[3];
$img = $getInfoVolume[4];
$nbPage = $getInfoVolume[5];
$dateSortie = $getInfoVolume[6];


$envoie = filter_input(INPUT_POST, "envoyer");
$message = "";


if (!empty($envoie) && !empty($envoie) && !empty($envoie) && !empty($envoie) && !empty($envoie))  {
    
    $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);

    $dateSortie = filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);
    $img = filter_input(INPUT_POST, "img", FILTER_SANITIZE_STRING);
    $nbPage = filter_input(INPUT_POST, "nbPage", FILTER_VALIDATE_INT);

    if (!empty($titre)) {
        if (modifieVolume($getIdVolume, $idManga, $titre, $volume, $img, $nbPage, $dateSortie)) {
            $message = "";
            header("location: ./editerManga.php?id=$idManga");
            exit;
        }
        else {
            $message = "Le volume n'a pas pu etre modifier !";
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
        <h2>Modifier le Volume <?=$volume?> de <?=$titreManga?></h2>

        <div id="right">
            <img src="./img/cover/<?=$img?>" alt="<?=$img?>" id="imageCover">
        </div>

        <h4 class="error"> 
            <?php if (!empty($message)) echo $message;?>
        </h4>
        <form action="" method="post" name="compte">
            <label for="titre">Titre* :</label><br>
            <input type="text" name="titre" id="titre" placeholder="Entrer un titre" <?php if (!empty($message)) echo 'class="errorInput"'?> value='<?php if (!empty($titre)) echo $titre ?>'><br><br>
            
            <label for="date">Date de sortie (YYYY/MM/JJ) :</label><br>
            <input type="text" name="date" id="date" placeholder="Entrer une date" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($dateSortie)) echo 'value='.$dateSortie ?>><br><br>
            
            <label for="img">Image :</label><br>
            <input type="text" name="img" id="img" placeholder="Entrer le nom et l'extention" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($img)) echo 'value='.$img ?>><br><br>
                       
            <label for="nbPage">Nombre de page :</label><br>
            <input type="number" name="nbPage" id="nbPage" placeholder="Entrer la nombre de page" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($nbPage)) echo 'value='.$nbPage ?>><br><br>
   
            <input type="submit" value="Modifier" name="envoyer">
        </form>
        <a href="./editerManga.php?id=<?=$idManga?>" id="retour">Retour</a>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>