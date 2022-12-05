<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:../../login.php");
}

require("../datebase.php");
//On verifie si un id se trouve dans l'url et s'il n'est pas vide
if (isset($_GET['id']) and !empty($_GET['id'])) {

    $idOfThequestion = $_GET['id'];
    // Requete pour l'id autheur de la question
    $checkIfQuestionExists = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfThequestion));
    //Vérifie si la question existe
    if ($checkIfQuestionExists->rowCount() > 0) {
        // On récupere les donnéees
        $authorIdOfQuestion = $checkIfQuestionExists->fetch();
        $idOfUser = $_SESSION['id'];

        //Verifie si la personne qui supprime est bien l'auteur
        if ($authorIdOfQuestion['id_auteur'] == $idOfUser) {

            //On supprime de la bdd 
            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id= ?');
            $deleteThisQuestion->execute(array($idOfThequestion));

            header("Location: ../../my-questions.php");


        } else {
            echo "Vous n'êtes pas l'auteur de la question";
        }


    } else {
        echo "Aucune question n'a été trouvée1";
    }

} else {
    echo "Aucune question n'a été trouvée2";
}