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

    <div class="logo">
        <img src="../Images/Universite-de-Ouagadougou-I-Joseph-Ki-Zerbo-Burkina-Faso-etudier-en-Afrique.jpg" alt="logo" width="150px">
    </div>


    <section id="acceuil">
        <div class="partone">
            <h1> Menu de gestion </h1>

            <div>
                <p>
                    <a href="#">Ajouter un étudiant</a>
                </p>
                <p>
                    <a href="#"> Consulter la liste des étudiants</a>
                </p>
                <p>
                    <a href="#"> Ajouter un tuteur </a>
                </p>
            </div>
        </div>
        <div class="parttwo">
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
                            <option value="">Choisir un tuteur</option>
                            <?php
                            ?>
                        </select>
                    </div>

                    <button type='submit' name="infoE" value="ajouter" > Ajouter </button>

                </form>
                

            </section>
        </div>
    </section>

    <!-- 
        les jointures en SQL
     -->
    <script src="../Font-Awesome-6.x/js/all.min.js"></script>
</body>

</html>