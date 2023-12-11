<?php
class Formation
{
    private int $idStagiaire;
    private int $idFormateur;
    private $dateDebut;
    private $dateFin;

    public function setIdStagiaire($idStagiaire): void
    {
        $this->idStagiaire = $idStagiaire;
    }
    public function getIdStagiaire(): int
    {
        return $this->idStagiaire;
    }
    public function setIdFormateur($idFormateur): void
    {
        $this->idFormateur = $idFormateur;
    }
    public function getIdFormateur(): int
    {
        return $this->idFormateur;
    }
    public function setDateDebut($dateDebut): void
    {
        $this->dateDebut = $dateDebut;
    }
    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    public function setDateFin($dateFin): void
    {
        $this->dateFin = $dateFin;
    }
    public function getDateFin()
    {
        return $this->dateFin;
    }
}
?>