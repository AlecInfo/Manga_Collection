<?php

/*
 * M151 : exercices PDO (UE01, UE02 et UE03) : étape 7
 * fichier commun pour accès à la base de données mysql (mariadb)
 * ajouter à l'étape 5
 * Patrick J. Bergeret, mai 2021
 * version 1.0
 */

define("VERSION", "07");

// base
// proxmox CT mariadb
//define("HOST", "10.5.50.56");
// egine
define("HOST", "localhost");
define("DBNAME", "bdmangas");
define("DSN", "mysql:host=" . HOST . ";dbname=" . DBNAME);
define("USER", "root");
define("MDP", "");

// fichier des constantes : nom et emplacement
define( 'PATH', __DIR__ );
define( 'CSTNAME', '/const.inc.php' );
define( 'CSTFICHIER', PATH . CSTNAME );
