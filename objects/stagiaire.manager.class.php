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
        return $this->base->lastInsertId();
    }
    public function affichageStagiaire()
    {
        $stagiaires = array();
        $sql = "SELECT * FROM `stagiaire` JOIN nationallite ON stagiaire.ID_NATIONALLITE = nationallite.ID_NATIONALLITE JOIN type_formation ON stagiaire.ID_TYPE_FORMATION = type_formation.ID_TYPE_FORMATION ORDER BY NOM_STAGIAIRE";
        $result = $this->base->query($sql);
        while ($e = $result->fetch()) {
            $stagiaire = new Stagiaire();
            $stagiaire->setId($e["ID_STAGIAIRE"]);
            $stagiaire->setNom($e["NOM_STAGIAIRE"]);
            $stagiaire->setPrenom($e["PRENOM_STAGIAIRE"]);
            $stagiaire->setNationalite($e["LIBELLE_NATIONALLITE"]);
            $stagiaire->setFormation($e["LIBELLE_TYPE_FORMATION"]);
            array_push($stagiaires, $stagiaire);
        }
        return $stagiaires;
    }
    public function suppressionStagiaires($idStagiaires)
    {
        $sql = "DELETE FROM `stagiaire` WHERE";
        foreach ($idStagiaires as $key => $idStagiaire) {
            if ($key === 0 || $key === "0") {
                $sql .= " ID_STAGIAIRE = " . $idStagiaire;
            } else {
                $sql .= " OR ID_STAGIAIRE = " . $idStagiaire;
            }
        }
        $delete = $this->base->query($sql);
        $delete->closeCursor();
    }
    public function update($stagiaire)
    {
        $sql = "UPDATE `stagiaire` SET `ID_TYPE_FORMATION` = :id_type_formation, `ID_NATIONALLITE` = :id_nationalite, `NOM_STAGIAIRE` = :nom, `PRENOM_STAGIAIRE` = :prenom WHERE `stagiaire`.`ID_STAGIAIRE` = :id_stagiaire";
        $statement = $this->base->prepare($sql);
        $statement->execute(array("id_stagiaire" => $stagiaire->getId(), "nom" => $stagiaire->getNom(), "prenom" => $stagiaire->getPrenom(), "id_nationalite" => $stagiaire->getIdNationalite(), "id_type_formation" => $stagiaire->getIdFormation()));
        $statement->closeCursor();
    }
}
?>