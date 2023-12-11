<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../CSS/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
</head>

<body>

    <a href="index.php">Retourner au menu</a>
    <h2>Suppression</h2>

    <form action="../manager/delete.php" method="post" enctype="multipart/form-data">
        <table>
            <thead>
                <tr>
                    <th>Suppression</th>
                    <th>Nom</th>
                    <th>Prenom</th>
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
                    <td>' . $stagiaire->getNom() . '</td>
                    <td>' . $stagiaire->getPrenom() . '</td>
                    <td>' . $stagiaire->getNationalite() . '</td>
                    <td>' . $stagiaire->getFormation() . '</td>
                    <td>';
                    $formations = $formationManager->affichageFormation($stagiaire);
                    foreach ($formations as $formation) {
                        echo $formation->getFormateur()->getNom() . ' , ' . $formation->getFormateur()->getSalle() . ' , ' . $formation->getDateDebut() . ' , ' . $formation->getDateFin() . '<br>';
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

    <script type="module" src="../JS/suppression.js"></script>
</body>

</html>