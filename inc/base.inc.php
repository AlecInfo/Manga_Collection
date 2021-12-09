<?php
require './inc/const.inc.php';

function conexBase() {
    // capture des codes erreurs
    try {
        // connexion à la base sur le serveur
        $cnx = new PDO(DSN, USER, MDP);
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    return $cnx;
}

function deconexBase(&$c, &$r=NULL) {
    // fermeture PDO et PDOStatement
    $c = NULL;
    $r = NULL;
    return 0;
}

/* 
* ---------------------------------------
*  Fonction de la table utilisateurs
* ---------------------------------------
*/ 

function selectListeUser() {
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir la liste des articles
        $sql = "SELECT idUtilisateur, nom, mdp, email from utilisateurs;";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetchAll();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function selectUser($name){
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir les informations d'un article
        $sql = "SELECT * from utilisateurs where nom='$name';";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetch();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function selectUserById($id){
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir les informations d'un article
        $sql = "SELECT * from utilisateurs where idUtilisateur='$id';";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetch();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function connectionSite($name){
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir les informations d'un article
        $sql = "SELECT mdp from utilisateurs Where nom = '$name';";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetch();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function userExist($name){
        // capture des codes erreurs
        try {
            // ouverture base
            $cnx = conexBase();
            // requête pour obtenir les informations d'un article
            $sql = "SELECT idUtilisateur from utilisateurs Where nom = '$name';";
            $requete = $cnx->query($sql);
            // récupération de la réponse à la requête
            $reponse = $requete->fetch();
        } catch (PDOException $e) {
            print nl2br("Error!: " . $e->getMessage() . "\r");
            exit();
        }
        // fermeture base
        deconexBase($cnx, $requete);
        return $reponse;
}

function ajoutUser($name, $mdp, $email){
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour créer un nouvel article
        $sql = "INSERT INTO utilisateurs (nom, mdp, email) VALUES ('$name', '$mdp', '$email');";
        $retour = $cnx->exec($sql);
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture connexion à la base
    deconexBase($cnx);
    return $retour;
}

function supprimeUser($id) {
    // capture des codes erreurs
    try {
        // connexion à la base
        $cnx = conexBase();
        // requête pour créer supprimer un article
        $sql = "DELETE FROM utilisateurs WHERE idUtilisateur = '$id';";
        $retour = $cnx->exec($sql);
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture connexion à la base
    deconexBase($cnx);
    return $retour;



    
}

function modifieUser($id, $nom, $mdp, $email) {
    // capture des codes erreurs
    try {
        // connexion à la base
        $cnx = conexBase();
        // requête pour créer supprimer un article
        $sql = "UPDATE utilisateurs SET nom='$nom', mdp='$mdp', email='$email' WHERE idUtilisateur='$id';";
        $retour = $cnx->exec($sql);
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture connexion à la base
    deconexBase($cnx);
    return $retour;
}

function nbUser() {
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir les informations d'un article
        $sql = "SELECT count(idUtilisateur) from utilisateurs;";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetch();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse[0];
}

/*
* ---------------------------------------
*  Fonction de la table manga
* ---------------------------------------
*/

function selectListeMangas() {
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir la liste des articles
        $sql = "SELECT idManga, titre, anneeParution, cover, nbVolume, auteur, nom, synopsis from mangas m, maisonedition me WHERE  m.maisonEdition = me.idMaison order by idManga;";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetchAll();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function selectListeMangasOrderASC() {
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir la liste des articles
        $sql = "SELECT idManga, titre, anneeParution, cover, nbVolume, auteur, nom, synopsis from mangas m, maisonedition me WHERE  m.maisonEdition = me.idMaison order by titre;";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetchAll();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function selectMangaById($id){
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir les informations d'un article
        $sql = "SELECT idManga, titre, anneeParution, cover, nbVolume, auteur, nom, synopsis from mangas m, maisonedition me WHERE  m.maisonEdition = me.idMaison and idManga='$id';";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetch();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function nbVolume() {
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir les informations d'un article
        $sql = "SELECT SUM(nbVolume) from mangas;";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetch();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse[0];
}

function nbTitre() {
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir les informations d'un article
        $sql = "SELECT count(idManga) from mangas;";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetch();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse[0];
}

function mangaExist($titre){
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir les informations d'un article
        $sql = "SELECT idManga from mangas Where titre = '$titre';";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetch();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function ajoutManga($titre, $annee, $cover, $nbVolume, $auteur, $maison, $synopsis){
    // capture des codes erreurs 
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour créer un nouvel article
        $sql = "INSERT INTO mangas (titre, anneeParution, cover, nbVolume, auteur, maisonEdition, synopsis) VALUES ('$titre', '$annee', '$cover', '$nbVolume', '$auteur', '$maison', '$synopsis'); ";
        $retour = $cnx->exec($sql);
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture connexion à la base
    deconexBase($cnx);
    return $retour;
}

function supprimeManga($id) {
    // capture des codes erreurs
    try {
        // connexion à la base
        $cnx = conexBase();
        // requête pour créer supprimer un article
        $sql = "DELETE FROM mangas WHERE idManga = '$id';";
        $retour = $cnx->exec($sql);
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture connexion à la base
    deconexBase($cnx);
    return $retour;
}

function modifieManga($id, $titre, $cover, $annee, $nbVolume, $auteur, $maison, $synopsis) {
    // capture des codes erreurs
    try {
        // connexion à la base
        $cnx = conexBase();
        // requête pour créer supprimer un article
        $sql = "UPDATE mangas SET titre='$titre', cover='$cover', anneeParution='$annee', nbVolume='$nbVolume', auteur='$auteur', maisonEdition='$maison', synopsis='$synopsis' WHERE idManga='$id';";
        $retour = $cnx->exec($sql);
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture connexion à la base
    deconexBase($cnx);
    return $retour;
}

function rechercheManga($chaine){
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir la liste des articles
        $sql = "SELECT idManga, titre, anneeParution, cover, nbVolume, auteur, nom, synopsis from mangas m, maisonedition me WHERE  m.maisonEdition = me.idMaison and  titre like '%$chaine%' order by titre;";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetchAll();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}


/*
* ---------------------------------------
*  Fonction de la table maisonEdition
* ---------------------------------------
*/


function selectListeMaison() {
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir la liste des articles
        $sql = "SELECT * from maisonedition order by nom";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetchAll();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function selectMaisonByName($name){
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir les informations d'un article
        $sql = "SELECT idMaison from maisonedition WHERE nom='$name';";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetch();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}


/*
* ---------------------------------------
*  Fonction de la table volumes
* ---------------------------------------
*/

function selectListeVolumes($id) {
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir la liste des articles
        $sql = "SELECT idVolume, idManga, titre, volume, cover, nbPage, dateSortie from volumes where idManga = '$id' order by volume;";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetchAll();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function selectVolumes($id) {
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir la liste des articles
        $sql = "SELECT idVolume, idManga, titre, volume, cover, nbPage, dateSortie from volumes where idVolume = '$id';";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetchAll();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse;
}

function nbVolumeById($id) {
    // capture des codes erreurs
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour obtenir les informations d'un article
        $sql = "SELECT count(idVolume) from volumes where idManga = '$id';";
        $requete = $cnx->query($sql);
        // récupération de la réponse à la requête
        $reponse = $requete->fetch();
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture base
    deconexBase($cnx, $requete);
    return $reponse[0];
}

function ajoutVolume($idManga, $titre, $volume, $cover, $page, $dateSortie){
    // capture des codes erreurs 
    try {
        // ouverture base
        $cnx = conexBase();
        // requête pour créer un nouvel article
        $sql = "INSERT INTO  volumes (idManga, titre, volume, cover, nbPage, dateSortie) VALUES ('$idManga', '$titre', '$volume', '$cover', '$page', '$dateSortie');";
        $retour = $cnx->exec($sql);
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture connexion à la base
    deconexBase($cnx);
    return $retour;
}

function modifieVolume($idVolume, $idManga, $titre, $volume, $cover, $page, $dateSortie) {
    // capture des codes erreurs
    try {
        // connexion à la base
        $cnx = conexBase();
        // requête pour créer supprimer un article
        $sql = "UPDATE volumes SET idManga='$idManga', titre='$titre', volume='$volume', cover='$cover', nbPage='$page', dateSortie='$dateSortie' WHERE idVolume='$idVolume';";
        $retour = $cnx->exec($sql);
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture connexion à la base
    deconexBase($cnx);
    return $retour;
}

function supprimeVolume($id) {
    // capture des codes erreurs
    try {
        // connexion à la base
        $cnx = conexBase();
        // requête pour créer supprimer un article
        $sql = "DELETE FROM volumes WHERE idVolume = '$id';";
        $retour = $cnx->exec($sql);
    } catch (PDOException $e) {
        print nl2br("Error!: " . $e->getMessage() . "\r");
        exit();
    }
    // fermeture connexion à la base
    deconexBase($cnx);
    return $retour;
}
