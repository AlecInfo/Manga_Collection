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
$titre = $getInfoManga[1];
$annee = $getInfoManga[2];
$cover = $getInfoManga[3];
$auteur = $getInfoManga[5];
$maisonEdition = $getInfoManga[6];
$synopsis = $getInfoManga[7];
if (isset($_SESSION["nbVolume"]) && !empty($_SESSION["nbVolume"])) {
    $nbVolume = $_SESSION["nbVolume"];
    $_SESSION["nbVolume"] = null;
}
else {
    $nbVolume = $getInfoManga[4];
}

// recuperation des donnes de la maison d édition
$getListeMaison = selectListeMaison();
$maisonEditionId = selectMaisonByName($maisonEdition);

// recuperation des donnes des volumes
$getListeVolumes = selectListeVolumes($idManga);

$envoie = filter_input(INPUT_POST, "envoyer");

if (!empty($envoie)) {
    $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
    $cover = filter_input(INPUT_POST, "cover", FILTER_SANITIZE_STRING);
    $nbVolume = filter_input(INPUT_POST, "nbVolume", FILTER_VALIDATE_INT);
    $annee = filter_input(INPUT_POST, "annee", FILTER_VALIDATE_INT);
    $auteur = filter_input(INPUT_POST, "auteur", FILTER_SANITIZE_STRING);
    $maisonEdition = filter_input(INPUT_POST, "maisonEdition", FILTER_SANITIZE_STRING);
    $maisonEditionId = selectMaisonByName($maisonEdition);
    $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_STRING);

    if (!empty($titre) && !empty($cover) && !empty($nbVolume) && !empty($annee) && !empty($synopsis) && !empty($auteur) && !empty($maisonEditionId[0])) {
        $message = "";
        $_SESSION["editionManga"] = $titre;
        modifieManga($getIdManga, $titre, $cover, $annee, $nbVolume, $auteur, $maisonEditionId[0], $synopsis);
        header("location: ./gestionDonnees.php");
        exit;
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
    <title>Editer le manga</title>
</head>
<body>
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
        <!-- bouton pour ajouter un volume -->
        <a href="ajouterVolume.php?id=<?=$idManga?>"><img src="./img/bouton/add.png" alt="ajout user"></a>

        <h1>Manga collection</h1>
    </header>
    <main>
        <h2>Modifier un manga</h2>
        <h4 class="error"> 
            <?php if (!empty($message)) echo $message;?>
        </h4>
        
        <div id="right">
            <img src="./img/cover/<?=$cover?>" alt="<?=$cover?>" id="imageCover">
            
            <div id="volumes">
                <?php
                    if (!empty($getListeVolumes)) 
                    {
                        foreach ($getListeVolumes as $item) {
                            ?>
                            <div id="volumesEdit">
                                <img src="./img/cover/<?=$item['cover']?>" alt="<?=$item['cover']?>" id="volume">
                                <p>
                                    Tome: <?=$item["volume"]?>     
                                    <br>
                                    <a href="editerVolumes.php?idManga=<?=$idManga?>&idVolume=<?= $item["idVolume"]?>"><img src="./img/bouton/editer.png" alt="editer" id="editer"></a>
                                    <a href="supprimerVolumes.php?id=<?php echo $item["idVolume"];?>"><img src="./img/bouton/supprimer.png" alt="supprimer" id="supprimer"></a>                         
                                </p>
                            </div>
                            <?php
                        }
                    }
                    else {  
                        ?>
                            <p>Le manga n'a pas encore de volume</p>
                        <?php
                    }
                ?>
            </div>
        </div>
        



        <form action="" method="post">
            <label for="titre">Titre :</label><br>
            <input type="text" name="titre" id="titre" placeholder="Entrer un titre" <?php if (!empty($message)) echo 'class="errorInput"'?> value="<?php if (!empty($titre)) echo $titre ?>"><br><br>
            
            <label for="cover">Couverture :</label><br>
            <input type="text" name="cover" id="cover" placeholder="Entrer le nom de l'image" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($cover)) echo 'value='.$cover ?>><br><br>
            
            <label for="nbVolume">Nombre de volume :</label><br>
            <input type="number" name="nbVolume" id="nbVolume" placeholder="Entrer le nombre de volume" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($nbVolume)) echo 'value='.$nbVolume ?>><br><br>
            
            <label for="annee">Année de parution :</label><br>
            <input type="number" name="annee" id="annee" placeholder="Entrer une année" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($annee)) echo 'value='.$annee ?>><br><br>
            
            <label for="auteur">Auteur* :</label><br>
            <input type="text" name="auteur" id="auteur" placeholder="Entrer un auteur" <?php if (!empty($message)) echo 'class="errorInput"'?> value='<?php if (!empty($auteur)) echo $auteur ?>'><br><br>

            <label for="maisonEdition">Maison d'édition* :</label><br>
            <select name="maisonEdition" id="maisonEdition">
                <?php
                foreach ($getListeMaison as $item) {
                    ?>
                    <option value="<?=$item["nom"]?>" <?php if($maisonEdition == $item["nom"]) echo "selected"?>><?=$item["nom"]?></option>
                    <?php
                }
                ?>
            </select><br><br>

            <label for="synopsis">Synopsis :</label><br>
            <textarea name="synopsis" id="synopsis" cols="62" rows="15" placeholder="Entrer un synopsis" <?php if (!empty($message)) echo 'class="errorInput"'?>><?php if (!empty($synopsis)) echo $synopsis ?></textarea><br><br>
            
            <input type="submit" value="Modifier" name="envoyer">
        </form>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>