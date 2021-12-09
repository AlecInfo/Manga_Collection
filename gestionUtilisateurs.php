<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$nbUser = nbUser();

$listeUtilisateurs = selectListeUser();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
    <?php 
        // message de modification
        if (isset($_SESSION["editionUser"]) && !empty($_SESSION["editionUser"])) {
            ?> <h4 class="bienvenu"><?=$_SESSION["editionUser"]?> a été modifier !</h4> <?php ;
            $_SESSION["editionUser"] = array();
        }

        // message de suppretion
        if (isset($_SESSION["ajoutUser"]) && !empty($_SESSION["ajoutUser"])) {
            ?> <h4 class="bienvenu"><?=$_SESSION["ajoutUser"]?> a été ajouter !</h4> <?php ;
            $_SESSION["ajoutUser"] = array();
        }

        // message de ajout d'un utilisateur
        if (isset($_SESSION["suppretionUser"]) && !empty($_SESSION["suppretionUser"])) {
            ?> <h4 class="deconnection"><?=$_SESSION["suppretionUser"]?> a été supprimer !</h4> <?php ;
            $_SESSION["suppretionUser"] = array();
        }
        ?>

        <!-- bouton pour ajouter un utilisateur -->
        <a href="ajouterUser.php"><img src="./img/bouton/add.png" alt="ajout user"></a>

        <h1>Manga collection</h1>
    </header>
    <main>
        <p>Nombre de compte: <?=$nbUser?></p>
        <br>
        <table class="tableDonnees">
            <thead>     
                <tr>
                    <th id="id">N°</th>
                    <th id="nom">Nom</th>
                    <th id="mdp">Mot de passe</th>
                    <th id="email">Email</th>
                    <th id="edit"></th>
                    <th id="supp"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($listeUtilisateurs as $item) {
                ?>
                <tr>
                    <td><?php echo $item['idUtilisateur']; ?></td>
                    <td><?php echo $item['nom']; ?></td>
                    <td><?php echo decrypter($item['mdp'], key_CrypDecryp()); ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><a href="editerUser.php?id=<?php echo $item["idUtilisateur"];?>"><img src="./img/bouton/editer.png" alt="editer" id="editer"></a></td>
                    <?php
                    if ($item["nom"] != "admin") {
                        ?>
                        <td><a href="supprimerUser.php?id=<?php echo $item["idUtilisateur"];?>"><img src="./img/bouton/supprimer.png" alt="supprimer" id="supprimer"></a></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>