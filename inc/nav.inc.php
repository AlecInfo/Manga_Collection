<ul class="menu">
    <!-- menu variable en fonction du statut de l'utilisateur -->
    <section id="1">
        <li><a href="./index.php">Accueil</a></li>
        <?php
        if (isset($_SESSION["connection"]) && $_SESSION["connection"] == "true") {
            ?>
            <li><a href="./collection.php">Ma collection</a></li>
            <li><a href="./recherche.php">Rechercher</a></li>
            <?php
        }
        if (isset($_SESSION["login"]) && !empty($_SESSION["login"]) && $_SESSION["login"] == "admin") {
            ?>
            <li><a href="./gestionUtilisateurs.php">Gestion utilisateurs</a></li>
            <li><a href="./gestionDonnees.php">Gestion données</a></li>
            <?php
        }
        ?>
    </section>
    <section id="2">
        <?php
        if (!isset($_SESSION["connection"]) || $_SESSION["connection"] != "true") {
            ?>
            <li><a href="./inscription.php">Inscription</a></li>
            <li><a href="./connection.php">Connection</a></li>
            <?php
        }
        if (isset($_SESSION["connection"]) && $_SESSION["connection"] == "true") {
            ?>
            <li><a href="./compte.php">Mon compte</a></li>
            <li><a href="./deconnection.php">Déconnetion</a></li>
            <?php
        }
        ?>
    </section>
</ul>

