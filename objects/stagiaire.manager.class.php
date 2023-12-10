<?php
class Stagiaire_manager
{
    private $base;
    public function __construct($base)
    {
        $this->base = $base;
    }
    public function nationalite()
    {
        $nationalites = array();
        $sql = "SELECT * FROM `nationallite` ORDER BY LIBELLE_NATIONALLITE";
        $result = $this->base->query($sql);
        while ($e = $result->fetch()) {
            $nationalite = new Stagiaire();
            $nationalite->setIdNationalite($e["ID_NATIONALLITE"]);
            $nationalite->setNationalite($e["LIBELLE_NATIONALLITE"]);
            array_push($nationalites, $nationalite);
        }
        return $nationalites;
    }
    public function typeFormation()
    {
        $formations = array();
        $sql = "SELECT * FROM `type_formation` ORDER BY LIBELLE_TYPE_FORMATION";
        $result = $this->base->query($sql);
        while ($e = $result->fetch()) {
            $formation = new Stagiaire();
            $formation->setIdFormation($e["ID_TYPE_FORMATION"]);
            $formation->setFormation($e["LIBELLE_TYPE_FORMATION"]);
            array_push($formations, $formation);
        }
        return $formations;
    }
    public function insert($stagiaire)
    {
        $sql = "INSERT INTO `stagiaire` (NOM_STAGIAIRE, PRENOM_STAGIAIRE, ID_NATIONALLITE, ID_TYPE_FORMATION) VALUES (:nom, :prenom, :id_nationalite, :id_type_formation)";
        $statement = $this->base->prepare($sql);
        $statement->execute(array("nom" => $stagiaire->getNom(), "prenom" => $stagiaire->getPrenom(), "id_nationalite" => $stagiaire->getIdNationalite(), "id_type_formation" => $stagiaire->getIdFormation()));
        $statement->closeCursor();
    }
    public function forme($stagiaire)
    {
        $sql = "";
        // $statement = $this->base->prepare($sql);
    }
}
?>