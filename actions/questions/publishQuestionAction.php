<?php


require("actions/datebase.php");
//Si le formulaire est validé
if (isset($_POST['validate'])) {
    // Si toutes les champs ont été remplies
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {

        //On stock chaque donnée dans une variable 
        $question_title = htmlspecialchars($_POST['title']);
        //nl12br permet de sauvegarder les retours à la ligne
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/Y');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        //On prépare à envoyer les donnéees
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(titre,description,contenu,id_auteur,pseudo_auteur, date_publication) VALUES (?,?,?,?,?,?)');
        //On envoi els données
        $insertQuestionOnWebsite->execute(
            array(
                $question_title,
                $question_description,
                $question_content,
                $question_id_author,
                $question_pseudo_author,
                $question_date
            )
        );

        $succesMsg = "Votre question a bien été publiée!";

    } else {
        $errorMsg = 'Veuillez completer tous les champs...';
    }
}