<?php



try {
    //permet de se connecter à la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', 'root');

} catch (Exception $e) {
    die('Une erreur a été detecté : ' . $e->getMessage());
}