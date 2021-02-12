<?php

session_start();
if(isset($_SESSION['id'])){
    header('Location: profil.php');
}

// $db = new PDO('mysql:host=127.0.0.1;port=8889;dbname=groupe8', 'root', 'root');
$db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=groupe8', 'root', '');

if(isset($_POST['formconnexion'])){
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $passconnect = sha1($_POST['passwordconnect']);
    if(!empty($mailconnect) && !empty($passconnect)){
        $requser = $db->prepare("SELECT * FROM membres WHERE email = ? AND mdp = ?");
        $requser->execute(array($mailconnect, $passconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1){
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['numMembre'];
            $_SESSION['name'] = $userinfo['nom'];
            $_SESSION['fisrtname'] = $userinfo['prenom'];
            $_SESSION['mail'] = $userinfo['email'];
            $_SESSION['role'] = $userinfo['role'];
            header("Location: profil.php?id=" . $_SESSION['id']);
        } else {
            $erreur = "Email ou mot de passe incorrect !";
        }
    } else {
        $erreur = "Veuillez remplir tous les champs !";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>

    <div align="center">
        <h3>Connexion</h3>
        <br><br>

        <form action="signin.php" method="POST">
            <div class="form-floating mb-3">
                <input name="mailconnect" type="email" class="form-control" id="floatingInput" placeholder="Votre mail" value="<?php if(isset($mail)) {echo $mail;} ?>">
                <label for="floatingInput">Mail</label>
            </div>
            <div class="form-floating mb-3">
                <input name="passwordconnect" type="password" class="form-control" id="floatingInput" placeholder="Votre mot de passe">
                <label for="floatingInput">Mot de passe</label>
            </div>
            <input name="formconnexion" class="btn btn-primary" type="submit" value="Se connecter">
            
        </form>
        <br>
        <p>Pas encore de compte ? <a href="signup.php">Inscrivez-vous !</a></p>
        <?php
            if(isset($erreur)){
                echo '<font color="red">' . $erreur . '</font>';
            }
        ?>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>