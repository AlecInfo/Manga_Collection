<?php
session_start();
require_once "./inc/base.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

// suppretion de la session
$_SESSION[] = array();
session_destroy();

// creation de session pour la déconnection
session_start();
$_SESSION["deconnection"] = "true";

// redirection
header("location: ./index.php")
?>