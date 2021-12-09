<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

// affichage de toutes info du manga selectionner
if (!empty($_GET["id"])) {
    $getIdManga = $_GET["id"];

    $getInfoManga = selectMangaById($getIdManga);

    $idManga = $getInfoManga[0];
    $titre = $getInfoManga[1];
    $annee = $getInfoManga[2];
    $cover = $getInfoManga[3];
    $nbVolume = $getInfoManga[4];
    $auteur = $getInfoManga[5];
    $maisonEdition = $getInfoManga[6];
    $synopsis = $getInfoManga[7];

    $getListeVolumes = selectListeVolumes($idManga);
}

// recuperation de l id du client
$idClient = userExist($_SESSION["login"]);

// ajout des mangas selectionner dans la collection
$envoi = filter_input(INPUT_POST, "envoyer");

if (!empty($envoi)) {
    
    $mangaSelect = $_POST['volume'];


    // header("location: collection.php");
    // exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Ajouter un manga a la collection</title>
</head>
<body>
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
        <h1>Manga collection</h1>
    </header>
    <main id="volumes">

        <h1><?=$titre?></h1>
        <h3><?=$auteur?> | <?=$maisonEdition?> | <?=$annee?></h3>
        <h4>Synopsis :</h4>
        <p><?=$synopsis?></p>
        <br>
        <form action="" method="post">
            <?php
                if (!empty($getListeVolumes)) 
                {
                    foreach ($getListeVolumes as $item) {
                        ?>
                        <div id="volume">
                            <img src="./img/cover/<?=$item['cover']?>" alt="<?=$item['cover']?>">
                            <p>
                                <input type="checkbox" name="volume[]" id="<?=$item["idManga"].$item["volume"]?>" value="<?=$item["volume"]?>" checked="checked">
                                Tome: <?=$item["volume"]?>
                                <br>
                                <?=$item["titre"]?>                             
                            </p>
                        </div>
                        <?php
                    }
                    ?>
                    <input type="submit" value="Ajouter a la collection" name="envoyer">
                    <?php
                }
                else {  
                    ?>
                        <p>Le manga n'a pas encore de volume</p>
                    <?php
                }
            ?>
        </form>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>