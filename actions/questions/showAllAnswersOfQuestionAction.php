<?php

require("actions/datebase.php");

$idOfQuestion = $_GET['id'];

$getAnswerOfQuestion = $bdd->prepare("SELECT * FROM reponses WHERE id_question = ? ");
$getAnswerOfQuestion->execute(array($idOfQuestion));