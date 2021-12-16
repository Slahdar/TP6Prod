
    <?php
    if(isset($_POST['ajouterCom'])){     //pour vérifier qu'on passe par le formulaire
        
        //Etape 1: Connexion à la bdd
        require('ini.php');
        
        //Etape 2: Récupération des données du formulaire
        $id = $_POST['idArt'];
        $auteur = $_POST['auteur'];
        $contenu = $_POST['commentaire'];

        //Etape 3: Ajouter les données du formulaire dans la bdd

        if(!empty($auteur) && !empty($contenu)){

            $reponse = $connexion->prepare("INSERT INTO commentaire(auteurCom, contenuCom, numArticle) VALUES (:a,:c,:n)");
            
            $reponse->execute(array('a'=>$auteur,'c'=>$contenu,'n'=>$id));

            header("Location: commentaires.php?idarticle=$id");
        }else{
            header("Location: commentaires.php?idarticle=$id");
        }

    }else{
        header('Location: articles.php');
    }
    ?>