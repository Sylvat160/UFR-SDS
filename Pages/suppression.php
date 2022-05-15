<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $id = $_GET['id'];
    $req = $bdd->query("DELETE FROM etudiants WHERE numero_e = '$id'");
    $success = "L'étudiant a été supprimé avec succès"; 
    header('Location: liste.php?success='.$success);
?>