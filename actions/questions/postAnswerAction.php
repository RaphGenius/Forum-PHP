<?php

require("actions/datebase.php");

if (isset($_POST['validate'])) {

    if (!empty($_POST['answer'])) {

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));

        $inserAnswer = $bdd->prepare("INSERT INTO reponses (id_auteur, pseudo_auteur, id_question, contenu) VALUES (?,?,?,?) ");
        $inserAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $_GET["id"], $user_answer));


    }


}