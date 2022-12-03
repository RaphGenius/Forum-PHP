<?php

require("actions/datebase.php");

//Si le formulaire a été validé
if (isset($_POST["validate"])) {
    //Si tous les champs ont été remplie
    if (!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["content"])) {
        // Recupere les données rentrés par l'utilisateur
        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));
        //On envoie les informations
        $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?  ');
        $editQuestionOnWebsite->execute(
            array(
                $new_question_title,
                $new_question_description,
                $new_question_content,
                $_GET['id'],
            )
        );
        //On redirige vers la page d'accueil
        header('Location: my-questions.php');

    } else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}