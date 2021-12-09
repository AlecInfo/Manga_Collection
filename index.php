<?php

/*
Auteur: Piette Alec

Date debut: 11 juin 2021
Date fin: 

Description: création d'un site de mangas pour s'entrainer pour l'exa du M151
Version: V1

*/

session_start();
require_once "./inc/base.inc.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Manga c'est la vie</title>
</head>
<body class="pageAccueil">
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
        <?php 
        // message de bienvenu
        if (isset($_SESSION["connection"]) && !empty($_SESSION["connection"]) && !empty($_SESSION["pseudo"] && isset($_SESSION["pseudo"]))) {
            ?> <h4 class="bienvenu">Bienvenu sur notre site <?=$_SESSION["pseudo"]?> !</h4> <?php ;
            $_SESSION["pseudo"] = array();
        }

        // message d'au-revoir
        if (isset($_SESSION["deconnection"]) && !empty($_SESSION["deconnection"])) {
            ?> <h4 class="deconnection">Suite a votre demande vous avez été déconnecter</h4> <?php ;
            $_SESSION["deconnection"] = array();
        }
        ?>
        <h1>Manga collection</h1>
    </header>
    <main>
        <section>
            <table class="tableStat">
                <thead>
                    <tr>
                        <th>Statistique</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre de titre</td>
                        <td><?=nbTitre()?></td>
                    </tr>
                    <tr>
                        <td>Nombre de volume</td>
                        <td><?=nbVolume()?></td>
                    </tr>
                </tbody>
            </table>

        </section>
        <section>
            <h2>Ce que nous proposons.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales mattis turpis nec efficitur. Quisque molestie lorem felis, et euismod enim blandit eget. Maecenas vel eros dignissim, ullamcorper tortor non, condimentum lectus. Integer varius velit eget venenatis sollicitudin. Duis ut velit nisl. In accumsan leo et lacus vehicula suscipit vitae id massa. Vestibulum condimentum facilisis finibus. Duis aliquet porttitor ligula, nec sagittis orci tristique vel. Nulla ut tristique massa, nec elementum nisi. Nunc non metus ut ligula ultricies tincidunt a non tortor. Phasellus eu bibendum urna. Pellentesque non erat rhoncus, semper eros sed, mollis felis. Nulla gravida condimentum risus, vel dapibus sem.</p>
        </section>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>