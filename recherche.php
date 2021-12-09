<?php
session_start();
require_once "./inc/base.inc.php";
require_once "./inc/cryptageDecryptage.inc.php"; 

// redireciton si pas connecter
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$listeMangas = selectListeMangasOrderASC();

$recherche = filter_input(INPUT_POST, "recherche", FILTER_SANITIZE_STRING);

if (!empty($recherche)) {
    
    $listeMangas = rechercheManga($recherche);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>rechercher</title>
</head>
<body>
    <nav>
        <?php require_once "./inc/nav.inc.php"?>
    </nav>
    <header>
        <h1>Manga collection</h1>
    </header>
    <main>
        <form action="" method="post" name="rechercherForm">        
            <input type="text" name="recherche" id="rechercher" placeholder="rechercher" <?php if (!empty($recherche)) echo 'value='.$recherche ?>>
            <input type="image" name="envoyer" src="./img/bouton/loupe.png" alt="rechercher">
        </form>
            <?php      
                
            if (!empty($listeMangas)) 
            {
                foreach ($listeMangas as $item) {
                    ?>
                    <div id="mangaElement">
                        <img src="./img/cover/<?php echo $item['cover']; ?>" alt="<?php echo $item['cover']; ?>" name="cover">

                        <h2 id="titre"><?php echo $item['titre']; ?></h2>
                        <a href="ajouterCollection.php?id=<?php echo $item["idManga"];?>"><img src="./img/bouton/addmanga.png" alt="ajouter" id="ajouter"></a>
                        <h5 id="auteur"><?php echo $item['auteur']; ?></h5>
                        <h5 id="maison"><?php echo $item['nom']; ?></h5>
                    </div>
                    <?php                    
                }
            }
            else {  
                ?>
                    <p>La recherche est introuvable !</p>
                <?php
            }
            ?>
    </main>
    <footer>
        <p>&copy; Alec Piette, juin 2021.</p>
    </footer>
</body>
</html>