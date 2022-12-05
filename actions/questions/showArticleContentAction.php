<?php


require('actions/datebase.php');

// Verifie s'il id de la question est présent et non null
if (isset($_GET['id']) && !empty($_GET["id"])) {

    //Recupere l'id de la question 
    $idOfTheQuestion = $_GET["id"];

    //Verifie si la question existe 
    $checkIfQuestionExists = $bdd->prepare("SELECT * FROM questions WHERE id = ?");
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    //Si la question existe
    if ($checkIfQuestionExists->rowCount() > 0) {

        $questionInfos = $checkIfQuestionExists->fetch();

        $question_title = $questionInfos['titre'];
        $question_content = $questionInfos['contenu'];
        $question_id_author = $questionInfos['id_auteur'];
        $question_pseudo_author = $questionInfos['pseudo_auteur'];
        $question_publication_date = $questionInfos['date_publication'];





    } else {
        $errorMsg = "Aucune question n'a été trouvée";
    }

} else {

    $errorMsg = "Aucune question n'a été trouvée";
}