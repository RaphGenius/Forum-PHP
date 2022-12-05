<?php

require("actions/datebase.php");
//query prépare et execute la requete
//Recupere les questions par defaults
$getAllQuestions = $bdd->query("SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 5");

//vérifier si une recherche a été rentrée par l'utilisateur
if (isset($_GET["search"]) && !empty($_GET["search"])) {

    //La recherche utilisateur
    $userSearch = $_GET['search'];

    //On recupere toutes les questions liées à la recherche
    //% signifie tout ce qu'il y a avant ou après, recherche un titre qui contient le mot rentré par l'utilisateur
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%' . $userSearch . '%" ORDER BY id DESC');



} 