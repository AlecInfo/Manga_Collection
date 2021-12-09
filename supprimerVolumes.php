<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php";

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$getIdVolume = $_GET["id"];
$getInfoVolume = selectVolumes($getIdVolume)[0];

$idVolume = $getInfoVolume[0];
$idManga = $getInfoVolume[1];

print_r($idManga);

supprimeVolume($idVolume);

header("location: ./editerManga.php?id=$idManga");
?>