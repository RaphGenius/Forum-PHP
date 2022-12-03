<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:../../login.php");
}

require("../datebase.php");
if (isset($_GET['id']) and !empty($_GET['id'])) {

    $idOfThequestion = $_GET['id'];
    $checkIfQuestionExists = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfThequestion));

    if ($checkIfQuestionExists->rowCount() > 0) {

        $authorIdOfQuestion = $checkIfQuestionExists->fetch();
        $idOfUser = $_SESSION['id'];

        if ($authorIdOfQuestion['id_auteur'] == $idOfUser) {

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