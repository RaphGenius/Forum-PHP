<?php


require("actions/datebase.php");

//Les questions ont un id qui s'incrémente, le order by permet d'afficher les plus gros id en premier, et donc les derniers postés en 1er
$getAllMyQuestions = $bdd->prepare('SELECT id,titre,description FROM questions WHERE id_auteur = ? ORDER BY id DESC ');

$getAllMyQuestions->execute(array($_SESSION['id']));