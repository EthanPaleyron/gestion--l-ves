<?php
class Formateur
{
    private int $id;
    private string $nom;
    private string $prenom;
    private int $idSalle;
    private string $salle;
    private int $idFormation;
    private string $formation;

    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }
    public function getNom(): string
    {
        return $this->nom;
    }
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    public function setIdSalle($idSalle): void
    {
        $this->idSalle = $idSalle;
    }
    public function getIdSalle(): int
    {
        return $this->idSalle;
    }
    public function setSalle($salle): void
    {
        $this->salle = $salle;
    }
    public function getSalle(): string
    {
        return $this->salle;
    }
    public function setIdFormation($idFormation): void
    {
        $this->idFormation = $idFormation;
    }
    public function getIdFormation(): int
    {
        return $this->idFormation;
    }
    public function setFormation($formation): void
    {
        $this->formation = $formation;
    }
    public function getFormation(): string
    {
        return $this->formation;
    }
}
?>