<?php
class Stagiaire
{
    private int $id;
    private string $nom;
    private string $prenom;
    private int $idNationalite;
    private string $nationalite;
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
    public function setIdNationalite($idNationalite): void
    {
        $this->idNationalite = $idNationalite;
    }
    public function getIdNationalite(): int
    {
        return $this->idNationalite;
    }
    public function setNationalite($nationalite): void
    {
        $this->nationalite = $nationalite;
    }
    public function getNationalite(): string
    {
        return $this->nationalite;
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