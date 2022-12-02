<?php

require("actions/datebase.php");

// On verifie si l'id est présent dans l'url + s'il n'est pas vide 
if (isset($_GET['id']) and !empty($_GET["id"])) {

    //On stock l'id de l'url
    $idOfQuestion = $_GET["id"];

    //On recupere toutes les données de la question en fonction de l'id de l'url
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));
    // SI la question existe
    if ($checkIfQuestionExists->rowCount() > 0) {
        //On récupere les données
        $questionInfos = $checkIfQuestionExists->fetch();
        //Vérifie si l'id de l'user connecté == id de l'auteur de la question 
        if ($questionInfos["id_auteur"] == $_SESSION['id']) {
            //On stock les infos
            $question_title = $questionInfos["titre"];
            $question_description = $questionInfos["description"];
            $question_content = $questionInfos["contenu"];
            $question_date = $questionInfos['date_publication'];

            $question_description = str_replace("<br />", '', $question_description);
            $question_content = str_replace("<br />", '', $question_content);

        } else {
            $errorMsg = "Vous n'êtes pas l'auteur de cette question";
        }





    } else {
        $errorMsg = "Aucune question n'a été trouvée.";
    }



} else {
    $errorMsg = "Aucune question n'a été trouvée.";
}