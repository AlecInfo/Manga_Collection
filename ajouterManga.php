<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$envoie = filter_input(INPUT_POST, "envoyer");
$message = "";

$getListeMaison = selectListeMaison();


if (!empty($envoie)) {
    
    $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
    $annee = filter_input(INPUT_POST, "annee", FILTER_VALIDATE_INT);
    $img = filter_input(INPUT_POST, "img", FILTER_SANITIZE_STRING);
    $nb = filter_input(INPUT_POST, "nb", FILTER_VALIDATE_INT);
    $auteur = filter_input(INPUT_POST, "auteur", FILTER_SANITIZE_STRING);
    $maisonEdition = filter_input(INPUT_POST, "maisonEdition", FILTER_SANITIZE_STRING);
    $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_STRING);

    $maisonEditionId = selectMaisonByName($maisonEdition);

    if (!empty($titre) && !empty($annee) && !empty($img) && !empty($nb) && !empty($synopsis) && !empty($auteur) && !empty($maisonEditionId)) {

        if ($nb != 0) {
            $reponse = mangaExist($titre);  
            if (empty($reponse)) {
                
                if (ajoutManga($titre, $annee, $img, $nb, $auteur, $maisonEditionId[0], $synopsis)) {
                    $message = "";
                    $_SESSION["ajoutManga"] = $titre;
                    header("location: ./gestionDonnees.php");
                    exit;
                }
                else {
                    $message = "Le manga n'a pas pu etre ajouter !";
                }
            } else {
                $message = "Le manga existe déjà !";
            }
        }
        else {
            $message = "Le nombre de manga doit etre supperieur à 0 !";
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
    <title>Ajout d'un Manga</title>
</head>
<body>
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
        <h1>Manga collection</h1>
    </header>
    <main>
        <h2>Ajouter un Manga</h2>
        <h4 class="error"> 
            <?php if (!empty($message)) echo $message;?>
        </h4>
        <form action="" method="post">
            <label for="titre">Titre* :</label><br>
            <input type="text" name="titre" id="titre" placeholder="Entrer un titre" <?php if (!empty($message)) echo 'class="errorInput"'?> value='<?php if (!empty($titre)) echo $titre ?>'><br><br>
            
            <label for="annee">Année de parution* :</label><br>
            <input type="number" name="annee" id="annee" placeholder="Entrer une annee" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($annee)) echo 'value='.$annee ?>><br><br>
            
            <label for="img">Image (jpg)* :</label><br>
            <input type="text" name="img" id="img" placeholder="Entrer le nom et l'extention" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($img)) echo 'value='.$img ?>><br><br>
            
            <label for="nb">Nombre de volume* :</label><br>
            <input type="number" name="nb" id="nb" placeholder="Entrer un nombre de volume" <?php if (!empty($message)) echo 'class="errorInput"'?> <?php if (!empty($nb)) echo 'value='.$nb ?>><br><br>
            
            <label for="titre">Auteur* :</label><br>
            <input type="text" name="auteur" id="auteur" placeholder="Entrer un auteur" <?php if (!empty($message)) echo 'class="errorInput"'?> value='<?php if (!empty($auteur)) echo $auteur ?>'><br><br>

            <label for="titre">Maison d'édition* :</label><br>
            <select name="maisonEdition" id="maisonEdition" <?php if (!empty($message)) echo 'class="errorInput"'?>><?php if (!empty($message)) echo 'class="errorInput"'?>
            <option value="preSelect">-----Choisir une maison d'édition-----</option>
            <?php
            foreach ($getListeMaison as $item) {
                ?>
                <option value="<?=$item["nom"]?>"><?=$item["nom"]?></option>
                <?php
            }
            ?>
            </select><br><br>

            <label for="synopsis">Synopsis* :</label><br>
            <textarea name="synopsis" id="synopsis" cols="62" rows="15" placeholder="Entrer un synopsis" <?php if (!empty($message)) echo 'class="errorInput"'?>><?php if (!empty($synopsis)) echo $synopsis ?></textarea><br><br>

            <input type="submit" value="Ajouter" name="envoyer">
        </form>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>