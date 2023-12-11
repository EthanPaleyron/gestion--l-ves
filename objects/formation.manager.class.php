<?php
class Formation_manager
{
    private $base;
    public function __construct($base)
    {
        $this->base = $base;
    }
    public function enseigne($dureeFormation)
    {
        $sql = "INSERT INTO `forme` (ID_STAGIAIRE, ID_FORMATEUR, DATE_DEBUT, DATE_FIN) VALUES (:id_stagiaire, :id_formateur, :date_debut, :date_fin)";
        $statement = $this->base->prepare($sql);
        $statement->execute(array("id_stagiaire" => $dureeFormation->getIdStagiaire(), "id_formateur" => $dureeFormation->getIdFormateur(), "date_debut" => $dureeFormation->getDateDebut(), "date_fin" => $dureeFormation->getDateFin()));
        $statement->closeCursor();
    }
    public function affichageFormation($stagiaire)
    {
        $formations = array();
        $sql = "SELECT * FROM `forme` JOIN formateur ON forme.ID_FORMATEUR = formateur.ID_FORMATEUR JOIN salle ON formateur.ID_SALLE = salle.ID_SALLE WHERE ID_STAGIAIRE = :id_stagiaire";
        $result = $this->base->prepare($sql);
        $result->execute(array("id_stagiaire" => $stagiaire->getId()));
        while ($e = $result->fetch()) {
            $formateur = new Formateur();
            $formateur->setNom($e["NOM_FORMATEUR"]);
            $formateur->setSalle($e["LIBELLE_SALLE"]);
            $formation = new Formation();
            $formation->setFormateur($formateur);
            $formation->setDateDebut($e["DATE_DEBUT"]);
            $formation->setDateFin($e["DATE_FIN"]);
            array_push($formations, $formation);
        }
        $result->closeCursor();
        return $formations;
    }
}
?>