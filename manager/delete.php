<?php
include_once("../objects/connexion-base.php");
$stagiaireManager->suppressionStagiaires($_POST["stagiaires"]);
header("Location: ../pages/index.php");
?>