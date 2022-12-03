<?php
require("actions/users/securityAction.php");
require("actions/questions/myQuestionsAction.php");
?>

<!DOCTYPE html>
<html lang="fr">

<?php require('includes/head.php') ?>

<body>

    <?php require('includes/navbar.php');

    ?>

    <div class="container">
        <?php
        while ($question = $getAllMyQuestions->fetch()) {

        ?>
        <br />
        <div class="card">
            <div class="card-header">
                <?= $question['titre']; ?>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <?= $question['description'] ?>
                </p>

                <a href="#" class="btn btn-primary">Accéder à la question</a>
                <a href="edit-question.php?id=<?= $question['id'] ?>" class="btn btn-warning">Modifier la question</a>
                <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id'] ?>"
                    class="btn btn-danger">Supprimer la
                    question</a>
            </div>
        </div>
        <?php


        }
        ?>
    </div>

</body>

</html>