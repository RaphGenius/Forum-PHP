<?php
session_start();
//On précise action/ car le code sera éxecuté dans signup.php, qui n'est pas dans le dossier action
require('actions/datebase.php');

//On vérifie si l'utilisateur a validé
if (isset($_POST['validate'])) {

    //On vérifie si tous les champs ont bien été remplies
    if (!empty($_POST['pseudo']) and !empty($_POST['lastname']) and !empty($_POST['firstname']) and !empty($_POST['password'])) {
        // On stock chaque données dans une variable
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        //On récupere les users de la bdd pour ensuite vérifier si le pseudo a déjà été utilisé
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        // Si le pseudo de l'utilisateur ne correspond à aucun pseudo de la bdd
        if ($checkIfUserAlreadyExists->rowCount() === 0) {

            //On prépare l'inscription
            $insertUserOnWebSite = $bdd->prepare('INSERT INTO users (pseudo, nom, prenom, mdp) VALUES (?,?,?,?) ');
            //On envoie les données dans la bdd
            $insertUserOnWebSite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            // On récupère les infos de l'utilisateur qui vient de s'inscrire
            $getInfoOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
            $getInfoOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));
            //Recupere toutes les infos de l'utilisateur, stocké dans $userinfo
            $userInfos = $getInfoOfThisUserReq->fetch();

            //Authentification de l'utilisateur et récupération des données dans des variable global
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['nom'];
            $_SESSION['firstname'] = $userInfos['prenom'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];

            //On redirige l'utilisateur vers la page d'accueil
            header('Location: index.php');

        } else {
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    } else {

        $errorMsg = "Veuillez compléter tous les champs";

    }

}