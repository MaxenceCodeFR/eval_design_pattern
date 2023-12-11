<?php

class CompteBancaire
{
    private string $titulaire;
    private float $solde;
    private string $devise;
    private int $numeroCompte;
    private bool $premium;


    // Le construct est intégrer de base mais c'est bien de le mettre quand même
    public function __construct()
    {
    }

    //GETTERS ET SETTERS
    public function getTitulaire(): string
    {
        return $this->titulaire;
    }

    public function setTitulaire(string $titulaire): void
    {
        $this->titulaire = $titulaire;
    }

    public function getSolde(): int
    {
        return $this->solde;
    }

    public function setSolde(float $solde): void
    {
        $this->solde = $solde;
    }

    public function getDevise(): string
    {
        return $this->devise;
    }

    public function setDevise(string $devise): void
    {
        $this->devise = $devise;
    }

    public function getNumeroCompte(): int
    {
        return $this->numeroCompte;
    }

    public function setNumeroCompte(int $numeroCompte): void
    {
        $this->numeroCompte = $numeroCompte;
    }

    public function isPremium(): bool
    {
        return $this->premium;
    }

    public function setPremium(bool $premium): void
    {
        $this->premium = $premium;
    }
    //FIN DES GETTERS ET SETTERS


    //METHODES
    public function depot(int $montant): void
    {
        //On ajoute le montant au solde de l'instance
        $this->solde += abs($montant);
        //abs() permet d'avoir un nombre toujours positif
    }

    public function retrait(int $montant): void
    {
        //On retire le montant au solde de l'instance
        $this->solde -= abs($montant);
    }

    public function afficherSolde(): string
    {
        //Si le solde de l'instance est inférieur à 0, on affiche un message
        if ($this->solde < 0) {
            return "Votre solde est de {$this->solde} {$this->devise}, vous êtes à découvert";

            //Si le solde de l'instance est égal à 0, on affiche un message    
        } elseif ($this->solde === 0) {
            return "Votre solde est de {$this->solde} {$this->devise}, ça transpire la nuit ";

            //Sinon on affiche le solde de l'instance avec un message
        } else {
            return "Votre solde est de {$this->solde} {$this->devise}, d'au moins un 1 {$this->devise}";
        }
    }


    public function virement(int $montant, $autreCompte): void
    {
        //Si le solde de l'instance est inférieur au montant du virement, on affiche un message
        if ($this->solde < $montant) {
            echo "Vous n'avez pas assez d'argent pour effectuer ce virement #pauvre";
            return;
        }

        //Si le montant du virement est inférieur à 0, on affiche un message
        if ($montant < 0) {
            echo "Vous ne pouvez pas effectuer de virement négatif";
            return;
        }
        //On retire le montant au solde de l'instance
        $this->solde -= abs($montant);
        //On ajoute le montant au solde de l'instance $autreCompte
        $autreCompte->solde += abs($montant);
    }
}
