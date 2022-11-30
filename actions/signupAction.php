<?php

//On précise action/ car le code sera éxecuté dans signup.php, qui n'est pas dans le dossier action
require('actions/datebase.php');

if (isset($_POST['validate'])) {

    if (!empty($_POST['pseudo']) and !empty($_POST['lastname']) and !empty($_POST['firstname']) and !empty($_POST['password'])) {

        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firsname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserAlreadyExists->rowCount() === 0) {

            $insertUserOnWebSite = $bdd->prepare('INSERT INTO users (pseudo, nom, prenom, mdp) VALUES (?,?,?;?) ');
            $insertUserOnWebSite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

        } else {
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    } else {

        $errorMsg = "Veuillez compléter tous les champs";

    }

}