<?php session_start();
require("actions/users/showOneUserProfileAction.php")
    ?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<body>

    <?php include("includes/navbar.php"); ?>

    <div class="container">
        <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }

        if (isset($getHisQuestions)) {
        ?>
        <br>
        <div class="card">
            <div class="card-body">
                <h4>
                    @ <?= $user_pseudo ?>
                </h4>
                <hr>
                <p>
                    <?= $user_nom . " " . $user_prenom ?>
                </p>
            </div>

        </div>
        <br>

        <?php
            while ($question = $getHisQuestions->fetch()) {
        ?>
        <div class="card">
            <div class="card-header">
                <?= $question['titre'] ?>
            </div>
            <div class="card-body">
                <?= $question['description'] ?>
            </div>
            <div class="card-footer">
                Par <a href="profil.php?id=<?= $question["id_auteur"] ?>">
                    <?= $question['pseudo_auteur'] ?>
                </a> le <?= $question['date_publication'] ?>

            </div>
        </div>
        <br>

        <?php
            }

        }
        ?>
    </div>



</body>

</html>