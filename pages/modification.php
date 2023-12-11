<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../CSS/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>

<body>

    <a href="index.php">Retourner au menu</a>
    <h2>Modification</h2>

    <form action="../manager/delete.php" method="post" enctype="multipart/form-data">
        <table>
            <thead>
                <tr>
                    <th>Modification</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Nationnalité</th>
                    <th>Type de formation</th>
                    <th>Fomateur - Salle - Date debut - Date fin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("../objects/connexion-base.php");
                include_once("../objects/stagiaire.class.php");
                include_once("../objects/formateur.class.php");
                include_once("../objects/formation.class.php");
                $stagiaires = $stagiaireManager->affichageStagiaire();
                foreach ($stagiaires as $stagiaire) {
                    echo '<tr>
                    <td><input type="checkbox" name="stagiaires[]" value="' . $stagiaire->getId() . '"></td>
                    <td><input type="text" name="nom" value="' . $stagiaire->getNom() . '"></td>
                    <td><input type="text" name="prenom" value="' . $stagiaire->getPrenom() . '"></td>
                    ';
                    $nationalites = $stagiaireManager->nationalite();
                    echo '<td><select name="nationalite">';
                    foreach ($nationalites as $nationalite) {
                        if ($nationalite->getNationalite() !== $stagiaire->getNationalite()) {
                            echo '<option value="' . $nationalite->getIdNationalite() . '">' . $nationalite->getNationalite() . '</option>';
                        } else {
                            echo '<option selected value="' . $nationalite->getIdNationalite() . '">' . $nationalite->getNationalite() . '</option>';
                        }
                    }
                    echo '</select></td>';

                    $formations = $stagiaireManager->typeFormation();
                    echo '<td><select name="type_formation">';
                    foreach ($formations as $formation) {
                        if ($formation->getFormation() === $stagiaire->getFormation()) {
                            echo '<option value="' . $formation->getIdFormation() . '">' . $formation->getFormation() . '</option>';
                        } else {
                            echo '<option selected value="' . $formation->getIdFormation() . '">' . $formation->getFormation() . '</option>';
                        }
                    }
                    echo '</select></td>
                    <td>';
                    $formateurs = $formateurManager->formateurs();
                    foreach ($formateurs as $formateur) {
                        // RECUPPERATION DES SALLES ET FORMATION
                        $formateurManager->numSalle($formateur);
                        $formateurManager->idFormation($formateur);
                        $formateurManager->forme($formateur);
                        echo '<input type="checkbox" name="formateurs[]" data-metier="' . $formateur->getIdFormation() . '" id="formateur_' . $formateur->getId() . '" value="' . $formateur->getId() . '"><label for="formateur_' . $formateur->getId() . '">' . $formateur->getPrenom() . ' ' . $formateur->getNom() . ' dans la salle ' . $formateur->getSalle() . '</label>';

                        echo '<label for="date_debut_' . $formateur->getId() . '">, date debut :</label><input type="date" name="date_debut" data-metier="' . $formateur->getIdFormation() . '" id="date_debut_' . $formateur->getId() . '" value="' . date("Y-m-d") . '">
            
                        <label for="date_fin_' . $formateur->getId() . '">, date fin :</label><input type="date" name="date_fin" data-metier="' . $formateur->getIdFormation() . '" id="date_fin_' . $formateur->getId() . '" value="' . date("Y-m-d") . '">
                        <br>';
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <button type="button" id="tickAll">Tout selectionner</button>
        <input type="submit" value="Supprimer">
    </form>

    <a href="insertion.php">Ajout d'un stagiaire</a>
    <a href="suppression.php">Suppression d'un stagiaire</a>

    <script type="module" src="../JS/insertion.js"></script>
    <script type="module" src="../JS/selection.js"></script>
</body>

</html>