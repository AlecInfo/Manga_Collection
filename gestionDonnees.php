<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$nbTitre = nbTitre();
$nbVolume = nbVolume();

$listeMangas = selectListeMangas();

$recherche = filter_input(INPUT_POST, "recherche", FILTER_SANITIZE_STRING);


if (!empty($recherche)) {
    $listeMangas = rechercheManga($recherche);
    $_SESSION["recherche"] = $recherche;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./css/style.css">
    <title>Gestion des données</title>
</head>
<body>
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
        <?php 
        // message de modification
        if (isset($_SESSION["editionManga"]) && !empty($_SESSION["editionManga"])) {
            ?> <h4 class="bienvenu"><?=$_SESSION["editionManga"]?> a été modifier !</h4> <?php ;
            $_SESSION["editionManga"] = array();
        }

        // message de suppretion
        if (isset($_SESSION["ajoutManga"]) && !empty($_SESSION["ajoutManga"])) {
            ?> <h4 class="bienvenu"><?=$_SESSION["ajoutManga"]?> a été ajouter !</h4> <?php ;
            $_SESSION["ajoutManga"] = array();
        }

        // message de ajout d'un utilisateur
        if (isset($_SESSION["suppretionManga"]) && !empty($_SESSION["suppretionManga"])) {
            ?> <h4 class="deconnection"><?=$_SESSION["suppretionManga"]?> a été supprimer !</h4> <?php ;
            $_SESSION["suppretionManga"] = array();
        }
        ?>

        <!-- bouton pour ajouter un manga -->
        <a href="ajouterManga.php"><img src="./img/bouton/add.png" alt="ajout user"></a>

        <h1>Manga collection</h1>
    </header>
    <main>
        <form action="" method="post" name="rechercherForm">        
            <input type="text" name="recherche" id="rechercher" placeholder="rechercher" <?php if (!empty($recherche)) echo 'value='.$recherche ?>>
            <input type="image" name="envoyer" src="./img/bouton/loupe.png" alt="rechercher" value="o">
        </form>

        <p>Nombre de Titre: <?=$nbTitre?></p>
        <p>Nombre de Volume: <?=$nbVolume?></p><br>

        <table class="tableDonnees">
            <thead>     
            
                <tr>
                    <th id="image">Cover</th>
                    <th id="id">N°</th>
                    <th id="titre">Titre</th>
                    <th id="nbVolume">nb Volume</th>
                    <th id="maison">Maison édition</th>
                    <th id="edit"></th>
                    <th id="supp"></th>
                </tr>
            </thead>

            <?php      
            if (!empty($listeMangas)) 
            {
                foreach ($listeMangas as $item) {
                    ?>
                    <tbody>
                        <tr>
                            <td><img src="./img/cover/<?php echo $item['cover']; ?>" alt="<?php echo $item['cover']; ?>"></td>
                            <td><?php echo $item['idManga']; ?></td>
                            <td><?php echo $item['titre']; ?></td>
                            <td><?php echo $item['nbVolume']; ?></td>
                            <td><?php echo $item['nom'];?></td>
                            <td><a href="editerManga.php?id=<?php echo $item["idManga"];?>"><img src="./img/bouton/editer.png" alt="editer" id="editer"></a></td>
                            <td><a href="supprimerManga.php?id=<?php echo $item["idManga"];?>"><img src="./img/bouton/supprimer.png" alt="supprimer" id="supprimer"></a></td>       
                        </tr>
                    </tbody>
                    <?php
                }
            }
            else {  
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><br><br> La recherche est introuvable !</td>
                </tr>
                <?php
            }
            ?>

        </table>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>