<?php
session_start();
require_once "./inc/base.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$getIdUser = $_GET["id"];

$getInfoUser = selectUserById($getIdUser);
$pseudo = $getInfoUser[1];

$_SESSION["suppretionUser"] = $pseudo;

supprimeUser($getIdUser);

header("location: ./gestionUtilisateurs.php"
?>
