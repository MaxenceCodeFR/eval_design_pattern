<!-- <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Opérations bancaires</title>
</head>

<body>
    <form action="Banque.php" method="post">
        <label for="titulaire">Titulaire :</label>
        <input type="text" id="titulaire" name="titulaire" required><br><br>

        <label for="solde">Solde :</label>
        <input type="number" id="solde" name="solde" step="0.01" required><br><br>

        <label for="devise">Devise :</label>
        <input type="text" id="devise" name="devise" required><br><br>

        <label for="premium">Premium :</label>
        <input type="checkbox" id="premium" name="premium"><br><br>

        <label for="depot">Montant à déposer :</label>
        <input type="number" id="depot" name="depot" step="0.01"><br><br>

        <label for="retrait">Montant à retirer :</label>
        <input type="number" id="retrait" name="retrait" step="0.01"><br><br>

        <input type="submit" value="Créer le compte">
    </form>

</body>

</html> -->

<?php

//Require_once ou include fonctionne. Permet de recuperer le fichier a la manière d'un namespace mais sans namespacedu coup parce que sinon on aurait appeler ça 'namespace' mais l'a c'en est pas un
require_once 'CompteBancaireFactory.php';
require_once 'CompteBancaire.php';
require_once 'Compte/Pel.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $compte = CompteBancaireFactory::creerCompte(
        $_POST['numeroCompte'],
        $_POST['titulaire'],
        $_POST['solde'],
        $_POST['devise'],
        isset($_POST['premium'])
    );
}

$id1 = CompteBancaireFactory::creerCompte(123456, "Jean", 1000, "EUR", true);
$id2 = CompteBancaireFactory::creerCompte(12345, "Jean", 1000, "EUR", true);
$id3 = CompteBancaireFactory::creerCompte(123456, "Jean", 1000, "EUR", true);
$id4 = CompteBancaireFactory::creerCompte(123456, "Jean", 1000, "EUR", true);
?>

<!-- <form method="post">
    <label for="numeroCompte">Numéro de compte :</label>
    <input type="number" id="numeroCompte" name="numeroCompte" required><br><br>

    <label for="titulaire">Titulaire :</label>
    <input type="text" id="titulaire" name="titulaire" required><br><br>

    <label for="solde">Solde :</label>
    <input type="number" id="solde" name="solde" step="0.01" required><br><br>

    <label for="devise">Devise :</label>
    <input type="text" id="devise" name="devise" required><br><br>

    <label for="premium">Premium :</label>
    <input type="checkbox" id="premium" name="premium"><br><br>

    <input type="submit" value="Créer le compte">
</form> -->