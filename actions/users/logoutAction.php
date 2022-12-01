<?php
//on reprend la session en cours
session_start();
//On vide les info de la super variable
$_SESSION = [];
session_destroy();
header('Location: ../../login.php');