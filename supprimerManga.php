<?php
session_start();
require_once "./inc/base.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$getIdManga = $_GET["id"];

$getInfoManga = selectMangaById($getIdManga);
$titre = $getInfoManga[1];

$_SESSION["suppretionManga"] = $titre;

supprimeManga($getIdManga);

header("location: ./gestionDonnees.php")
?>
