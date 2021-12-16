
    <?php
    if(isset($_POST['ajouter'])){     //pour vérifier qu'on passe par le formulaire
        
        //Etape 1: Connexion à la bdd
        require('ini.php');
        
        //Etape 2: Récupération des données du formulaire
        $auteur = $_POST['auteur'];
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];

        //Etape 3: Ajouter les données du formulaire dans la bdd

        if(!empty($auteur) && !empty($titre) && !empty($contenu)){

            $reponse = $connexion->prepare("INSERT INTO article(auteurArt, titre, contenuArt) VALUES (:a,:t,:c)");
            
            $reponse->execute(array('a'=>$auteur,'t'=>$titre,'c'=>$contenu));

            header('Location: articles.php');
        }else{
            header('Location: articles.php');
        }

    }else{
        header('Location: articles.php');
    }
    ?>