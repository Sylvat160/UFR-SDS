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
                <th scope="col">Action</th>

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
                            echo "<a class=\"llink1 btn\" href='voir.php'><i class='fas fa-eye'></i></a>";
                            echo "<a class=\"llink2 btn\" href='#'><i class='fas fa-edit'></i></a>";
                            echo "<a class=\"llink3 btn\" href='#'><i class='fas fa-trash'></i></a>";
                        ?>
                       

                        <!-- <a id=""  class="llink1 btn" href="#" >
                            <i class="fas fa-eye"></i>
                        </a>    
                        <a class="llink2 btn" href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="llink3 btn" href="#">
                            <i class="fas fa-trash"></i>
                        </a> -->



                    </td>

                </tr>

            <?php
            }
            ?>



        </tbody>
    </table>

    




    <div class="footer">
        <svg xmlns="http://www.w3.org/2000/svg" width="280" height="70" viewBox="0 0 403 98">
            <text id="UFR_SDS" data-name="UFR / SDS" transform="translate(1 66)" fill="#93d6b4" stroke="#93d6b4" stroke-width="1" font-size="91" font-family="ColonnaMT, Colonna MT">
                <tspan x="0" y="0">UFR / SDS</tspan>
            </text>
        </svg>

        <p>&copy tout droit reservé</p>
    </div>




    <script src="../Font-Awesome-6.x/js/all.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
       
        // var id = document.getElementsByClassName('llink1');
        // for (var i = 0; i < id.length; i++) {
        //     id[i].addEventListener('click', function() {
        //         var id = this.getAttribute('id');
        //         alert("nom : " + $donnees['nom']);
        //     } , false);
        // }
    </script>


</body>

</html>