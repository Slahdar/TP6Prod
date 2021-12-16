<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- Form d'ajout d'article -->
    <form name='FajoutArticle' method="post" action="ajoutArticle.php">

        <fieldset>
            <label>Ajout Article:</label>
                <p>
                <label>Auteur : </label><input type="text" placeholder="Tapez le nom de l'auteur" name="auteur" />
                </p>
                <p>
                <label>Titre : </label><input type="text" placeholder="Tapez le titre de l'article" name="titre" />
                </p>
                <p>
                <label>Contenu de l'article : </label>
                </p>

                <textarea name="contenu" cols="60" rows="10"></textarea></br>
                <input type="submit" name="ajouter" value="Ajouter l'article" />
        </fieldset>

    </form>
    <h3 class="titleGlob">Nos 10 derniers articles :</h3>
    <?php

        // Etape 1  : connexion à la base de données
        require('ini.php');
    
    
        // Etape 2 : récupération des données de la base de données
    
        $sql = "SELECT numArticle, titre, contenuArt, dateArt,auteurArt FROM article
                ORDER BY numArticle DESC
                LIMIT 10";
    
        $reponse = $connexion->query($sql);
    
        // Etape 3 : Afficher les articles
    
        while ($data = $reponse->fetch()) {
    
            echo "<div class='articleStyle'><strong>".$data['titre']."</strong><div class='divider'></div></br>".
                $data['contenuArt']."</br></br>".
                "<i>Ecrit par ".$data['auteurArt']." le ".$data['dateArt']."</i></br>";
    
    ?>      
            <a class="linkToCom" href='commentaires.php?idarticle=<?php echo $data['numArticle']; ?>'>Vers les commentaires</a></div></br></br>
    <?php
        }
    ?>
</body>
</html>