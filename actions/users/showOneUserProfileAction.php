<?php

require("actions/datebase.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $idOfUser = $_GET['id'];

    //Verifie si l'user existe
    $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));

    if ($checkIfUserExists->rowCount() > 0) {
        $userInfos = $checkIfUserExists->fetch();

        //stock les infos de l'user
        $user_pseudo = $userInfos["pseudo"];
        $user_nom = $userInfos["nom"];
        $user_prenom = $userInfos["prenom"];

        //recupere toutes les questions posé par l'user
        $getHisQuestions = $bdd->prepare("SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC");
        $getHisQuestions->execute(array($idOfUser));



    } else {
        $errorMsg = "Aucun utilisateur trouvé";

    }



} else {

    $errorMsg = "Aucun utilisateur trouvé";

}