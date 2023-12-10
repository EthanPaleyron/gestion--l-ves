<?php
class Formateur_manager
{
    private $base;
    public function __construct($base)
    {
        $this->base = $base;
    }
    public function formateurs()
    {
        $formateurs = array();
        $sql = "SELECT * FROM `formateur` ORDER BY PRENOM_FORMATEUR";
        $result = $this->base->query($sql);
        while ($e = $result->fetch()) {
            $formateur = new Formateur();
            $formateur->setId($e["ID_FORMATEUR"]);
            $formateur->setPrenom($e["PRENOM_FORMATEUR"]);
            $formateur->setNom($e["NOM_FORMATEUR"]);
            $formateur->setIdSalle($e["ID_SALLE"]);
            array_push($formateurs, $formateur);
        }
        return $formateurs;
    }
    public function numSalle($formateur)
    {
        $sql = "SELECT LIBELLE_SALLE FROM `salle` WHERE ID_SALLE = :id_salle";
        $result = $this->base->prepare($sql);
        $result->execute(array("id_salle" => $formateur->getIdSalle()));
        $e = $result->fetch();
        $formateur->setSalle($e["LIBELLE_SALLE"]);
    }
    public function idFormation($formateur)
    {
        $sql = "SELECT * FROM `enseigne` WHERE ID_FORMATEUR = :id_formateur";
        $result = $this->base->prepare($sql);
        $result->execute(array("id_formateur" => $formateur->getId()));
        $e = $result->fetch();
        $formateur->setIdFormation($e["ID_TYPE_FORMATION"]);
    }
    public function forme($formateur)
    {
        $sql = "SELECT * FROM `type_formation` WHERE ID_TYPE_FORMATION = :id_formateur";
        $result = $this->base->prepare($sql);
        $result->execute(array("id_formateur" => $formateur->getIdFormation()));
        $e = $result->fetch();
        $formateur->setFormation($e["LIBELLE_TYPE_FORMATION"]);
    }
}
?>