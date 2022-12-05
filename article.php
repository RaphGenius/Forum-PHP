<?php
session_start();
require("actions/questions/showArticleContentAction.php");
require("actions/questions/postAnswerAction.php");
require("actions/questions/showAllAnswersOfQuestionAction.php");

?>

<!DOCTYPE html>
<html lang="en">

<?php require("includes/head.php") ?>

<body>

    <?php require("includes/navbar.php") ?>
    <br><br>


    <div class="container">

        <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }

        if (isset($question_publication_date)) {
        ?>

        <section class="show-content">
            <h3>
                <?= $question_title; ?>
            </h3>
            <hr>
            <p>
                <?= $question_content ?>
            </p>
            <hr>
            <small>
                <?="Créé par : " . $question_pseudo_author . " le " . $question_publication_date ?>
            </small>
        </section>
        <br>
        <section class="show-answers">

            <form class="form-group" method="POST">
                <div class="mb-3">
                    <label class="form-label">Réponse : </label>
                    <textarea class="form-control" name="answer"></textarea>
                    <button class="btn btn-primary mt-3" name="validate">Répondre</button>
                </div>



            </form>

            <?php
            while ($answer = $getAnswerOfQuestion->fetch()) {
            ?>
            <div class="card mb-3">
                <div class="card-header">
                    <?= $answer['pseudo_auteur'] ?>
                </div>
                <div class="card-body">
                    <?= $answer['contenu'] ?>
                </div>
            </div>

            <?php
            } ?>



            <?php
        }
            ?>



        </section>


        <br>

    </div>

</body>

</html>