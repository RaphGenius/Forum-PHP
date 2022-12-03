<?php

require("actions/users/securityAction.php");
require("actions/questions/publishQuestionAction.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('includes/head.php'); ?>

<body>
    <?php include("includes/navbar.php"); ?>
    <form class="container" method="POST">

        <br />
        <?php
        if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . "</p>";
        } elseif (isset($succesMsg)) {
            echo '<p>' . $succesMsg . "</p>";
        }
        ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description de la question</label>
            <textarea type="text" class="form-control" name="description"> </textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contenu de la question</label>
            <textarea type="text" class="form-control" name="content" autocomplete="off"> </textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Publier</button>
        <br>

    </form>



</body>

</html>