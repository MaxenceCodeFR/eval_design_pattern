<?php
include 'CompteBancaire.php';
include 'GestionnaireCompte.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulaire = $_POST['titulaire'];
    $solde = floatval($_POST['solde']);
    $devise = $_POST['devise'];
    $premium = isset($_POST['premium']);

    // Création d'une nouvelle instance de CompteBancaire avec les données du formulaire
    $nouveauCompte = new CompteBancaire($titulaire, $solde, $devise, $numeroCompte);
    $nouveauCompte->setPremium($premium);
}
echo "<h2>Informations du compte</h2>";
echo "<p>Titulaire : " . $nouveauCompte->getTitulaire() . "</p>";
echo "<p>Solde : " . $nouveauCompte->getSolde() . " " . $nouveauCompte->getDevise() . "</p>";
echo "<p>Compte premium : " . ($nouveauCompte->isPremium() ? "Oui" : "Non") . "</p>";
echo $nouveauCompte->afficherSolde();
echo "<h2>Opérations</h2>";
echo "<h3>Dépôt</h3>";

if (isset($_POST['depot'])) {
    $depot = floatval($_POST['depot']);
    $nouveauCompte->depot($depot);
    echo "<p>Vous avez déposé " . $depot . " " . $nouveauCompte->getDevise() . "</p>";
    echo $nouveauCompte->afficherSolde();
}

echo "<h3>Retrait</h3>";
if (isset($_POST['retrait'])) {
    $retrait = floatval($_POST['retrait']);
    $nouveauCompte->retrait($retrait);
    echo "<p>Vous avez retiré " . $retrait . " " . $nouveauCompte->getDevise() . "</p>";
    echo $nouveauCompte->afficherSolde();
}
