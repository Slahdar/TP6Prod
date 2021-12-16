<?php
try {
    
    $connexion = new PDO('mysql:host=localhost;dbname=bdArticles;charset=utf8', 'root', 'root');

    // echo 'accès avec succès à  la base de données ';
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}
?>