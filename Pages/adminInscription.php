<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/connection.css">
    <link rel="icon" href="../Images/Universite-de-Ouagadougou-I-Joseph-Ki-Zerbo-Burkina-Faso-etudier-en-Afrique.jpg">
    <title>UFR/SDS</title>
</head>

<body>

    <div class="logo">
        <img src="../Images/Universite-de-Ouagadougou-I-Joseph-Ki-Zerbo-Burkina-Faso-etudier-en-Afrique.jpg" alt="logo" width="150px">
    </div>

    <div class="formulaireIn">
        <h1> INSCRIPTION </h1>
        <form action="" method="POST">
            <div class="troisp">
                <p class="entre1">
                    <label for="nomA"><img src="../Images/Groupe 8.png" alt="" width="100px"></label>
                    <input type="text" name="nomA" id="nomA" placeholder="Nom" require>
                </p>

                <p class="entre2">
                    <input type="text" name="prenomA" id="prenomA" placeholder="Prenom (s)" require>
                    <label class="centre" for="prenomA"><img src="../Images/Groupe9.png" alt="" width="100px"></label>
                </p>

                <p class="entre1">
                    <label for="emailA"><img src="../Images/Groupe 8.png" alt="" width="100px"></label>
                    <input type="mail" name="emailA" id="emailA" placeholder="Email" require>
                </p>
            </div>
            <div class="deuxd">
                

                <p class="entre2">
                    <input type="password" name="passwordA" id="passwordA" placeholder="Entrez un mot de passe" require>
                    <label class="centre" for="passwordA"><img src="../Images/Groupe9.png" alt="" width="100px"></label>
                </p>

                <p class="entre1">
                    <label for="cpassA"><img src="../Images/Groupe 8.png" alt="" width="100px"></label>
                    <input type="password" name="cpassA" id="cpassA" placeholder="Confirmez votre mot de passe" require>
                </p>
            </div>

          
                <button type="submit" name="submit" value="Connexion">S'inscrire</button>
            
        </form>
    </div>


    <div class="footerA">
        <svg xmlns="http://www.w3.org/2000/svg" width="280" height="70" viewBox="0 0 403 98">
            <text id="UFR_SDS" data-name="UFR / SDS" transform="translate(1 66)" fill="#93d6b4" stroke="#93d6b4" stroke-width="1" font-size="91" font-family="ColonnaMT, Colonna MT">
                <tspan x="0" y="0">UFR / SDS</tspan>
            </text>
        </svg>

        <p>&copy tout droit reservé</p>
    </div>



    <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        if(isset($_POST['submit'])){
            $nomA = htmlentities($_POST['nomA']);
            $prenomA = htmlspecialchars($_POST['prenomA']);
            $emailA = htmlspecialchars($_POST['emailA']);
            $passwordA = md5($_POST['passwordA']);
            $cpassA = md5($_POST['cpassA']);

            if(!empty($nomA) AND !empty($prenomA) AND !empty($emailA) AND !empty($passwordA) AND !empty($cpassA)){
                if($passwordA == $cpassA){
                    $req = $bdd->prepare('INSERT INTO admin (nom, prenom, email, mot_de_passe) VALUES(:nomA, :prenomA, :emailA, :passwordA)');
                    $req->execute(array(
                        'nomA' => $nomA,
                        'prenomA' => $prenomA,
                        'emailA' => $emailA,
                        'passwordA' => $passwordA
                    ));
                    echo '<script>alert("Vous etes bien inscrit")</script>';
                    echo '<script>window.location.href="connection.php"</script>';
                }else{
                    echo '<script>alert("Veuillez verifier votre mot de passe")</script>';
                }
            }else{
                echo '<script>alert("Veuillez remplir tous les champs")</script>';
            }
        }
    ?>


</body>

</html>