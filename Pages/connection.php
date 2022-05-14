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

    <div class="formulaire">
        <h1> CONNEXION </h1>
        <form action="" method="POST">

            <p class="entre1">
                <label for="login"><img src="../Images/Groupe 8.png" alt="" width="100px"></label>
                <input type="text" name="login" id="login" placeholder="Votre login">
            </p>

            <p class="entre2">
                <input type="password" name="password" id="password" placeholder="Votre mot de passe">
                <label class="centre" for="password"><img src="../Images/Groupe9.png" alt="" width="100px"></label>
            </p>

            <p class="envoi">
                <button type="submit" name="submit" value="Connexion">Se connecter</button>
            </p>
        </form>
    </div>


    <div class="footer">
    <svg xmlns="http://www.w3.org/2000/svg" width="280" height="70" viewBox="0 0 403 98">
  <text id="UFR_SDS" data-name="UFR / SDS" transform="translate(1 66)" fill="#93d6b4" stroke="#93d6b4" stroke-width="1" font-size="91" font-family="ColonnaMT, Colonna MT"><tspan x="0" y="0">UFR / SDS</tspan></text>
</svg>
    
    <p>&copy tout droit reservé</p>
    </div>


    <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        if (isset($_POST['submit'])) {
            $login = htmlspecialchars($_POST['login']);
            $password = md5($_POST['password']);

            $req = $bdd->prepare('SELECT * FROM admin WHERE email = :login AND mot_de_passe = :password');
            $req->execute(array(
                'login' => $login,
                'password' => $password
            ));

            $resultat = $req->fetch();

            if ($resultat) {
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
                header('Location: ../Pages/acceuil.php');
            } else {
                echo '<p class="erreur">Login ou mot de passe incorrect</p>';
            }
        }
    ?>

    
</body>

</html>