<?php
session_start();
require("actions/questions/showArticleContentAction.php"); ?>

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

        <?php
        }
        ?>

    </div>

</body>

</html>