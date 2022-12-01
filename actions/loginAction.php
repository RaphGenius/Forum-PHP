<?php

//On précise action/ car le code sera éxecuté dans signup.php, qui n'est pas dans le dossier action
require('actions/datebase.php');

//On vérifie si l'utilisateur a validé
if (isset($_POST['validate'])) {

    //On vérifie si tous les champs ont bien été remplies
    if (!empty($_POST['pseudo']) and !empty($_POST['password'])) {
        // On stock chaque données dans une variable
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);


        //Recupere toutes les infos de l'utilisateur au pseudo correspondant
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? ');
        $checkIfUserExists->execute(array($user_pseudo));

        // Si le pseudo existe
        if ($checkIfUserExists->rowCount() > 0) {
            $userInfo = $checkIfUserExists->fetch();
            //On v
            if (password_verify($user_password, $userInfo['mdp'])) {

                //Authentification de l'utilisateur et récupération des données dans des variable global
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['lastname'] = $userinfo['nom'];
                $_SESSION['firstname'] = $userinfo['prenom'];
                $_SESSION['pseudo'] = $userinfo['pseudo'];

                //On redirige vers la page d'accueil
                header('Location: index.php');

            } else {
                $errorMsg = 'Votre mot de passe est incorrect';
            }

        } else {
            $errorMsg = 'Votre pseudo est incorrect...';
        }



    } else {

        $errorMsg = "Veuillez compléter tous les champs";

    }

}