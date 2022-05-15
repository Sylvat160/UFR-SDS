<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../Font-Awesome-6.x/css/all.min.css">
    <link rel="stylesheet" href="../CSS/connection.css">
    <link rel="icon" href="../Images/Universite-de-Ouagadougou-I-Joseph-Ki-Zerbo-Burkina-Faso-etudier-en-Afrique.jpg">
    <title>Document</title>
</head>

<body>

    <div class="logo">
        <img src="../Images/Universite-de-Ouagadougou-I-Joseph-Ki-Zerbo-Burkina-Faso-etudier-en-Afrique.jpg" alt="logo" width="150px">
    </div>

    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    if (isset($_GET['modif'])) {
        $id = $_GET['modif'];
        $req = $bdd->query("SELECT * FROM etudiants WHERE numero_e = '$id'");
        $donnees = $req->fetch();
    }
    ?>
    <div class="parttwo" id="modif">
        <form action="" method="POST" id="formE">

            <div>
                <label for="nomE"><i class="fa-solid fa-user"></i></label>
                <input type="text" name="nomE" value="<?php echo $donnees['nom'] ?>" placeholder="Nom">
            </div>

            <div>
                <label for="prenomE"><i class="fa-solid fa-user"></i></label>
                <input type="text" name="prenomE" value="<?php echo $donnees['prenom'] ?>" placeholder="Prenom">
            </div>

            <div>
                <label for="dateE"><i class="fa-regular fa-calendar"></i></label>
                <input type="date" value="<?php echo $donnees['daten_e'] ?>" name="dateE" placeholder="Date de naissance">
            </div>

            <div>
                <label for="emailE"><i class="fa-regular fa-envelope"></i></label>
                <input type="mail" name="mailE" value="<?php echo $donnees['email_e'] ?>" placeholder="E-mail">
            </div>

            <div>
                <label for="numeroE"><i class="fa-solid fa-phone"></i></label>
                <input type="text" value="<?php echo $donnees['numero_e'] ?>" name="numeroE" placeholder="numero">
            </div>

            <div class="tuteur">
                <select name="tuteur" id="">
                    <option value=""><?php $join = $bdd->query("SELECT * FROM etudiants INNER JOIN tuteurs ON numero_tuteur = numero_t ");
                                        $result = $join->fetch();
                                        // print_r($result);
                                        
                                        echo $result['nom'] . " " . $result['prenom']; ?>

                                        </option>
                    <?php
                    $reponse = $bdd->query('SELECT * FROM tuteurs');
                    while ($donnees = $reponse->fetch()) {
                    ?>
                        <option value="<?php echo $donnees['numero_t']; ?>"><?php echo $donnees['nom'] . ' ' . $donnees['prenom']; ?> </option>
                    <?php
                    }
                    $reponse->closeCursor();
                    ?>
                </select>
            </div>

            <button type='submit' name="modifier" value="modifier"> modifier </button>

        </form>
    </div>

    <?php
    if (isset($_POST['modifier'])) {
        $nom = $_POST['nomE'];
        $prenom = $_POST['prenomE'];
        $date = $_POST['dateE'];
        $mail = $_POST['mailE'];
        $numero = $_POST['numeroE'];
        $tuteur = $_POST['tuteur'];

        $req = $bdd->query("UPDATE etudiants SET nom = '$nom', prenom = '$prenom', daten_e = '$date', email_e = '$mail', numero_e = '$numero', numero_tuteur = '$tuteur' WHERE numero_e = '$id'");
        $success = "L'étudiant a été modifié avec succès";
        header('Location: liste.php?success='.$success);
    }
    ?>

</body>

</html>