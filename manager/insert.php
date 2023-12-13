<?php
include_once("../objects/connexion-base.php");
include_once("../objects/stagiaire.class.php");
include_once("../objects/formation.class.php");
$stagiaire = new Stagiaire();
$stagiaire->setNom(htmlspecialchars($_POST["nom"]));
$stagiaire->setPrenom(htmlspecialchars($_POST["prenom"]));
$stagiaire->setIdNationalite($_POST["id_nationalite"]);
$stagiaire->setIdFormation($_POST["id_formations"]);
$lastid = $stagiaireManager->insert($stagiaire);
$dureeFormation = new Formation();
$dureeFormation->setIdStagiaire($lastid);
foreach ($_POST["formateurs"] as $value) {
    $dureeFormation->setIdFormateur($value);
    $dureeFormation->setDateDebut($_POST["date_debut"]);
    $dureeFormation->setDateFin($_POST["date_fin"]);
    $formationManager->enseigne($dureeFormation);
}
header("Location: ../pages/insertion.php");
?>