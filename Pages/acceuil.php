<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Font-Awesome-6.x/css/all.min.css">
    <link rel="stylesheet" href="../CSS/connection.css">
    <link rel="icon" href="../Images/Universite-de-Ouagadougou-I-Joseph-Ki-Zerbo-Burkina-Faso-etudier-en-Afrique.jpg">
    <title>UFR/SDS</title>

</head>

<body>

    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    ?>

    <div class="logo">
        <img src="../Images/Universite-de-Ouagadougou-I-Joseph-Ki-Zerbo-Burkina-Faso-etudier-en-Afrique.jpg" alt="logo" width="150px">
    </div>


    <section id="acceuil">
        <div class="partone">
            <h1> Menu de gestion </h1>

            <div>
                <p>
                    <a id="ajoutE" href="#">Ajouter un étudiant</a>
                </p>
                <p>
                    <a href="liste.php"> Consulter la liste des étudiants</a>
                </p>
                <p>
                    <a id="ajoutT" href="#"> Ajouter un tuteur </a>
                </p>
            </div>
        </div>
        <div class="parttwo" id="parttwo">
            <h1> Ajouter un étudiant </h1>
            <section>
                <form action="" method="POST" id="formE">

                    <div>
                        <label for="nomE"><i class="fa-solid fa-user"></i></label>
                        <input type="text" name="nomE" placeholder="Nom">
                    </div>

                    <div>
                        <label for="prenomE"><i class="fa-solid fa-user"></i></label>
                        <input type="text" name="prenomE" placeholder="Prenom">
                    </div>

                    <div>
                        <label for="dateE"><i class="fa-regular fa-calendar"></i></label>
                        <input type="date" name="dateE" placeholder="Date de naissance">
                    </div>

                    <div>
                        <label for="emailE"><i class="fa-regular fa-envelope"></i></label>
                        <input type="mail" name="mailE" placeholder="E-mail">
                    </div>

                    <div>
                        <label for="numeroE"><i class="fa-solid fa-phone"></i></label>
                        <input type="text" name="numeroE" placeholder="numero">
                    </div>

                    <div class="tuteur">
                        <select name="tuteur" id="">
                            <option value="">choisir un tuteur</option>
                            <?php
                            $reponse = $bdd->query('SELECT * FROM tuteurs');
                            while ($donnees = $reponse->fetch()) {
                            ?>
                                <option value="<?php echo $donnees['numero_t']; ?>"><?php echo $donnees['nom'] . ' ' . $donnees['prenom']; ?>  </option>
                            <?php
                            }
                            $reponse->closeCursor();
                            ?>
                        </select>
                    </div>

                    <button type='submit' name="infoE" value="ajouter"> Ajouter </button>

                </form>


            </section>
        </div>

        <div class="parttree" id="parttree">
            <h1> Ajouter un tuteur </h1>
            <section>
                <form action="" method="POST" id="formT">

                    <div>
                        <label for="nomT"><i class="fa-solid fa-user"></i></label>
                        <input type="text" name="nomT" placeholder="Nom">
                    </div>

                    <div>
                        <label for="prenomT"><i class="fa-solid fa-user"></i></label>
                        <input type="text" name="prenomT" placeholder="Prenom">
                    </div>

                    <div>
                        <label for="numeroT"><i class="fa-solid fa-phone"></i></label>
                        <input type="text" name="numeroT" placeholder="numero">
                    </div>


                    <button type='submit' name="infoT" value="ajouter"> Ajouter </button>

                </form>

                <?php
                if (isset($_POST['infoT'])) {
                    $nomT = $_POST['nomT'];
                    $prenomT = $_POST['prenomT'];
                    $numeroT = $_POST['numeroT'];

                    if (!empty($nomT) && !empty($prenomT) && !empty($numeroT)) {
                        $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;', 'root', '');
                        $bdd->query("INSERT INTO tuteurs(nom, prenom, numero_t) VALUES('$nomT', '$prenomT', '$numeroT')");
                        echo '<p> Tuteur ajouté </p>';
                    } else {
                        echo '<p> <script> alert("Veuillez remplir tous les champs"); </alert> </p>';
                    }
                }
                ?>

            </section>
        </div>
    </section>


    <?php
    $join = $bdd->query("SELECT * FROM etudiants INNER JOIN tuteurs ON numero_tuteur = numero_t ");
    $result = $join->fetch();
    
    $numero_tuteur = $result['numero_tuteur'];
    

    if (isset($_POST['infoE'])) {
        $nomE = $_POST['nomE'];
        $prenomE = $_POST['prenomE'];
        $dateE = $_POST['dateE'];
        $mailE = $_POST['mailE'];
        $numeroE = $_POST['numeroE'];

        $tuteur = $_POST['tuteur'];

        if (!empty($nomE) && !empty($prenomE) && !empty($dateE) && !empty($mailE) && !empty($numeroE) && !empty($tuteur)) {

            $req = $bdd->prepare("INSERT INTO etudiants (nom , prenom , daten_e , email_e , numero_e , numero_tuteur) VALUES(:nomE, :prenomE, :dateE, :mailE, :numeroE, :tuteur)");
            $req->execute(array(
                'nomE' => $nomE,
                'prenomE' => $prenomE,
                'dateE' => $dateE,
                'mailE' => $mailE,
                'numeroE' => $numeroE,
                'tuteur' => $tuteur
            ));

            // echo '<script>alert("Etudiant ajouté avec succès")</script>';
        } else {
            echo '<script>alert("Veuillez remplir tous les champs")</script>';
        }
    }
    ?>

    <script>
        var parttwo = document.getElementById('parttwo');
        var ajoutE = document.getElementById('ajoutE');
        var parttree = document.getElementById('parttree');
        var ajoutT = document.getElementById('ajoutT');
        ajoutE.addEventListener('click', function() {
            parttwo.style.display = 'block';
            formE.style.display = 'block';
            parttree.style.display = 'none';
        }, false);



        ajoutT.addEventListener('click', function() {
            parttree.style.display = 'block';
            formT.style.display = 'block';
            parttwo.style.display = 'none';
        }, false);


        // ajoutE.addEventListener ('click', function(){
        //     var aff = document.getElementsByClassName('parttwo').style.display = 'block';

        // });
    </script>

    <!-- 
        les jointures en SQL
     -->
    <script src="../Font-Awesome-6.x/js/all.min.js"></script>
</body>

</html>