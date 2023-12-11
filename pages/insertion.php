<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../CSS/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion</title>
</head>

<body>

    <a href="index.php">Retourner au menu</a>
    <h2>Insertion</h2>

    <form action="../manager/insert.php" method="post" enctype="multipart/form-data">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <br>
        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" id="prenom">
        <br>
        <label for="nationalite">Nationalité :</label>
        <select name="id_nationalite" id="nationalite">
            <?php
            // RECUPPERATION DES NATIONALITES
            include_once("../objects/connexion-base.php");
            include_once("../objects/stagiaire.class.php");
            $nationalites = $stagiaireManager->nationalite();
            foreach ($nationalites as $nationalite) {
                echo '<option value="' . $nationalite->getIdNationalite() . '">' . $nationalite->getNationalite() . '</option>';
            }
            ?>
        </select>
        <br>
        <label for="formations">Type de la formation :</label>
        <select name="id_formations" id="formations">
            <?php
            // RECUPPERATION DES FORMATIONS
            $formations = $stagiaireManager->typeFormation();
            foreach ($formations as $formation) {
                echo '<option value="' . $formation->getIdFormation() . '">' . $formation->getFormation() . '</option>';
            }
            ?>
        </select>
        <br>
        <label for="formareurs">Formareurs par date :</label>
        <br>
        <?php
        // RECUPPERATION DES FORMATEURS
        include_once("../objects/formateur.class.php");
        $formateurs = $formateurManager->formateurs();
        foreach ($formateurs as $formateur) {
            // RECUPPERATION DES SALLES ET FORMATION
            $formateurManager->numSalle($formateur);
            $formateurManager->idFormation($formateur);
            $formateurManager->forme($formateur);
            echo '<input type="checkbox" name="formateurs[]" data-metier="' . $formateur->getIdFormation() . '" id="formateur_' . $formateur->getId() . '" value="' . $formateur->getId() . '"><label for="formateur_' . $formateur->getId() . '">' . $formateur->getPrenom() . ' ' . $formateur->getNom() . ' dans la salle ' . $formateur->getSalle() . '</label>';

            echo '<label for="date_debut_' . $formateur->getId() . '">, date debut :</label><input type="date" name="date_debut" data-metier="' . $formateur->getIdFormation() . '" id="date_debut_' . $formateur->getId() . '" value="' . date("Y-m-d") . '">
            
            <label for="date_fin_' . $formateur->getId() . '">, date fin :</label><input type="date" name="date_fin" data-metier="' . $formateur->getIdFormation() . '" id="date_fin_' . $formateur->getId() . '" value="' . date("Y-m-d") . '"><br>';
        }
        ?>
        <input type="submit" value="Envoyer">
    </form>

    <a href="suppression.php">Suppression d'un stagiaire</a>
    <a href="modification.php">Modification d'un stagiaire</a>

    <script type="module" src="../JS/insertion.js"></script>
</body>

</html>