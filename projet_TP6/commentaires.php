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
    <a class="redirectLink" href='articles.php'><= Retour vers les articles</a>
    <?php
        require('ini.php');//connexion bdd

        $id=$_GET['idarticle']; //On récupère id article par l'url

        //Réafficher l'article
        $sql = "SELECT a.numArticle, a.titre, a.contenuArt, a.dateArt, a.auteurArt
                FROM article a
                WHERE a.numArticle = $id";
        $reponse = $connexion->query($sql);

        while ($data = $reponse->fetch()) {
    
                echo "<div style='text-align:center;'><strong>".$data['titre']."</strong></br><div class='divider'></div><div style='margin-top:20px;'>".
                    $data['contenuArt']."</div></div></br></br>".
                    "<i>Ecrit par ".$data['auteurArt']." le ".$data['dateArt']."</i></br>";    
        }

        //Afficher les commentaires correspondant
        $sql = "SELECT c.numArticle, c.contenuCom, DATE_FORMAT(c.dateCom,'%D %b %Y'), c.auteurCom, c.numCommentaire
                FROM commentaire c
                WHERE c.numArticle = $id";
        $reponse = $connexion->query($sql);

        while ($data = $reponse->fetch()) {
            echo  "<div class='commentaireStyle'><h5>".$data['auteurCom']." : </h5>"
            .$data['contenuCom']."</br>".
            "<i>- Le ".$data["DATE_FORMAT(c.dateCom,'%D %b %Y')"]."</i></div></br>";
        }
    ?>
    <!-- Form d'ajout de commentaire -->
    <form name='FajoutCom' method="post" action="ajoutCommentaire.php">

        <fieldset>
            <label>Ajout Commentaire:</label>
                <p>
                <label>Pseudo : </label><input type="text" placeholder="Tapez le nom de l'auteur" name="auteur" />
                </p>
                <p>
                <label>Commentaire: </label>
                </p>

                <textarea name="commentaire" cols="60" rows="2"></textarea></br>
                <input type="hidden" name="idArt" value='<?php echo $id; ?>' /> <!--On passe l'id dans un hidden input -->
                <input type="submit" name="ajouterCom" value="Envoyer" />
        </fieldset>

    </form>
</body>
</html>

<?php

?>