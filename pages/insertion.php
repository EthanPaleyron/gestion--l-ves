<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion</title>
</head>

<body>

    <a href="index.php">Retourner au menu</a>
    <h2>Insertion</h2>

    <form action="" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" id="prenom">
        <label for="nationalite">Nationalité :</label>
        <select name="nationalite" id="nationalite">
            <option value="francais">Français</option>
            <option value="anglais">Anglais</option>
            <option value="espagnol">Espagnol</option>
            <option value="allemand">Allemand</option>
        </select>
        <label for="formations">Type de la formation :</label>
        <select name="formations" id="formations">
            <option value="web_designer">Web designer</option>
            <option value="developpeur_web">Développeur web</option>
        </select>
        <label for="formareurs">Formareurs par date :</label>
        <!-- <input type="checkbox" name="formateurs[]" id="formateur_1" value="Robert Dupont"><label for="formateur_1">Robert
            Dupont dans la salle 101</label> -->
        <label for="date_debut_1">date debut :</label><input type="date" name="date_debut" data-metier="developpeur_web"
            id="date_debut" value="2024-07-22">
        <label for="date_fin_1">date fin :</label><input type="date" name="date_fin" data-metier="developpeur_web"
            id="date_fin" value="2025-07-22">

        <input type="checkbox" name="formateurs[]" data-metier="web_designer" id="formateur_1"
            value="Robert Dupont"><label for="formateur_1">Robert Dupont</label>
        <input type="checkbox" name="formateurs[]" data-metier="web_designer" id="formateur_2"
            value="Jean Martin"><label for="formateur_2">Jean Martin</label>
        <input type="checkbox" name="formateurs[]" data-metier="developpeur_web" id="formateur_3"
            value="Paxi Dtsand"><label for="formateur_3">Paxi Dtsand</label>
        <input type="checkbox" name="formateurs[]" data-metier="developpeur_web" id="formateur_4"
            value="Alain Duval"><label for="formateur_4">Alain Duval</label>
        <input type="submit" value="Envoyer">
    </form>

    <a href="suppression.php">Suppression d'un stagiaire</a>
    <a href="modification.php">Modification d'un stagiaire</a>

    <script type="module" src="../JS/insertion.js"></script>
</body>

</html>