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
}
?>