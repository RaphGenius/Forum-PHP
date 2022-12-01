<?php require('actions/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php'); ?>

<body>
    </br>
    </br>
    <form class="container" method="POST">

        <?php
        if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . "</p>";
        }
        ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3 ">
            <label class="form-label" for="exampleInputPassword1">Mot de Passe</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
        <br><br>
        <a href="signup.php">
            <p>Je n'ai pas de compte, je m'inscris</p>
        </a>
    </form>
</body>

</html>