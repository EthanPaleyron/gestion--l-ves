<?php
include_once("../objects/connexion-base.php");
$stagiaireManager->suppressionStagiaires($_POST["stagiaires"]);
header("Location: http://localhost/gestion-eleves/pages/index.php");
?>