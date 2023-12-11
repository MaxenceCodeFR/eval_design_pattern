<?php

class Pel extends CompteBancaire
{
    private string $name = "PEL";
    private int $duree;
    private float $taux;

    public function __construct(string $name, int $duree, float $taux)
    {
        parent::__construct();
        $this->name = $name;
        $this->duree = $duree;
        $this->taux = $taux;
    }

    public function getDuree(): int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): void
    {
        $this->duree = $duree;
    }

    public function getTaux(): float
    {
        return $this->taux;
    }

    public function setTaux(float $taux): void
    {
        $this->taux = $taux;
    }

    public function calculInteret(): float
    {
        return $this->getSolde() * $this->taux;
    }
}
