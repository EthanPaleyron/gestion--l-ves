<?php
include_once("../objects/connexion-base.php");
include_once("../objects/stagiaire.class.php");
$stagiaire = new Stagiaire();
$stagiaire->setNom(htmlspecialchars($_POST["nom"]));
$stagiaire->setPrenom(htmlspecialchars($_POST["prenom"]));
$stagiaire->setIdNationalite($_POST["id_nationalite"]);
$stagiaire->setIdFormation($_POST["id_formations"]);
$stagiaireManager->insert($stagiaire);
$dureeFormation = new Stagiaire();

header("Location: http://localhost/gestion-eleves/pages/index.php");
?>