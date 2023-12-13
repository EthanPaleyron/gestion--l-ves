<?php
include_once("../objects/connexion-base.php");
include_once("../objects/stagiaire.class.php");
// include_once("../objects/formateur.class.php");
include_once("../objects/formation.class.php");
$stagiaire = new Stagiaire();
$formation = new Formation();
$formationManager->deleteFormation($_POST["stagiaires"]);
foreach ($_POST["stagiaires"] as $valueStagiaire) {
    $stagiaire->setId($valueStagiaire);
    $stagiaire->setNom(htmlspecialchars($_POST["nom_" . $valueStagiaire]));
    $stagiaire->setPrenom(htmlspecialchars($_POST["prenom_" . $valueStagiaire]));
    $stagiaire->setIdNationalite($_POST["id_nationalite_" . $valueStagiaire]);
    $stagiaire->setIdFormation($_POST["id_formations_" . $valueStagiaire]);
    $stagiaireManager->update($stagiaire);
    foreach ($_POST["formateurs_" . $valueStagiaire] as $valueFormateur) {
        $formation->setIdStagiaire($valueStagiaire);
        $formation->setIdFormateur($valueFormateur);
        $formation->setDateDebut($_POST["date_debut_" . $valueFormateur]);
        $formation->setDateFin($_POST["date_fin_" . $valueFormateur]);
        $formationManager->updateFormation($formation);
    }
}
header("Location: ../pages/modification.php");
?>