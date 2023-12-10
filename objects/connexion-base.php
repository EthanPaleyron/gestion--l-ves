<?php
$base = new PDO('mysql:host=127.0.0.1;dbname=base_gestion_eleves', 'root', '');
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
include("stagiaire.manager.class.php");
include("formateur.manager.class.php");
$stagiaireManager = new Stagiaire_manager($base);
$formateurManager = new Formateur_manager($base);
?>