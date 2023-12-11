<?php

class CompteBancaireFactory
{
    private static array $comptes = [];

    public static function creerCompte(int $numeroCompte, string $titulaire, float $solde, string $devise, bool $premium): CompteBancaire
    {
        //On vérifie si le compte existe déjà
        if (!array_key_exists($numeroCompte, self::$comptes)) {
            //Si il n'existe pas on le crée
            $nouveauCompte = new CompteBancaire();
            //On lui attribue les valeurs
            $nouveauCompte->setNumeroCompte($numeroCompte);
            $nouveauCompte->setTitulaire($titulaire);
            $nouveauCompte->setSolde($solde);
            $nouveauCompte->setDevise($devise);
            $nouveauCompte->setPremium($premium);

            //On l'ajoute au tableau
            self::$comptes[$numeroCompte] = $nouveauCompte;

            //On fait une boucle pour afficher les comptes
            foreach (self::$comptes as $compte) {
                echo $compte->getNumeroCompte() . "<br>";
            }
            return $nouveauCompte;
        } else {
            //Si le compte existe déjà on affiche un message d'erreur
            echo "Le compte existe déjà";
        }
    }
}
