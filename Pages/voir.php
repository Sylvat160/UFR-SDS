<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../assets/jquery.dataTables.min.css">
    <link type="text/css" rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../Font-Awesome-6.x/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="../CSS/connection.css">
    <link rel="icon" href="../Images/Universite-de-Ouagadougou-I-Joseph-Ki-Zerbo-Burkina-Faso-etudier-en-Afrique.jpg">



    <script src="../assets/jquery-3.6.0.min.js"></script>
    <script src="../assets/jquery.dataTables.min.js"></script>


    <title>UFR/SDS</title>
</head>

<body>

    <div class="logo">
        <img src="../Images/Universite-de-Ouagadougou-I-Joseph-Ki-Zerbo-Burkina-Faso-etudier-en-Afrique.jpg" alt="logo" width="150px">
    </div>

    <div id="recherche">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="149" height="148" viewBox="0 0 149 148">
            <g id="Ellipse_1" data-name="Ellipse 1" fill="#476468" stroke="#707070" stroke-width="1">
                <ellipse cx="74.5" cy="74" rx="74.5" ry="74" stroke="none" />
                <ellipse cx="74.5" cy="74" rx="74" ry="73.5" fill="none" />
            </g>
        </svg>


    </div>


    <table class="table table-borderless" id="myTable">
        <thead>
            <tr>
                <th scope="col">n°</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">E-mail</th>
                <th scope="col">Numero</th>
                <th scope="col">Tuteur</th>

            </tr>

        </thead>
        <tbody>

            <?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;', 'root', '');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

            $i = 0;
            $req = $bdd->query("SELECT * FROM etudiants");

            while ($donnees = $req->fetch()) {
                $i++;
                $count = count($donnees);
            ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $donnees['nom']; ?></td>
                    <td><?php echo $donnees['prenom']; ?></td>
                    <td><?php echo $donnees['daten_e']; ?></td>
                    <td><?php echo $donnees['email_e']; ?></td>
                    <td><?php echo $donnees['numero_e']; ?></td>
                    <td>
                        
                        <?php
                       
                        $req1 = $bdd->query("SELECT * FROM tuteurs ");
                        $donnees1 = $req1->fetch();
                        echo $donnees1['nom'] . " " . $donnees1['prenom'];
                            
                        ?>


                        



                    </td>

                </tr>

            <?php
            }
            ?>



        </tbody>
    </table>



    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }



    ?>


    <script src="../JS/bootstrap.bundle.min.js"></script>
</body>

</html>