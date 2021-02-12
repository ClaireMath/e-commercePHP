<?php

    // $db = new PDO('mysql:host=127.0.0.1;port=8889;dbname=groupe8', 'root', 'root');
    $db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=groupe8', 'root', '');

   if(isset($_POST['forminscription'])){
    $firstname = htmlspecialchars($_POST['firstname']);
    $name = htmlspecialchars($_POST['name']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']);
    $passwordc = sha1($_POST['passwordc']);

    if(!empty($_POST['firstname']) && !empty($_POST['name'])
        && !empty($_POST['mail']) && !empty($_POST['password'])
        && !empty($_POST['passwordc'])){
            

                if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    $reqmail = $db->prepare("SELECT * FROM membres WHERE email = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0){
                        if($password == $passwordc){
                            $insertmbr = $db->prepare("INSERT INTO membres(nom, prenom, email, role, mdp) VALUES (?, ?, ?, 1, ?)");
                            $insertmbr->execute(array($name, $firstname, $mail, $password));
                            $erreur = "Votre compte a bien été créé ! <a href=\"signin.php\">Me connecter</a>";
                        } else {
                            $erreur = "Vos mots de passes ne correspondent pas !";
                        }
                    } else {
                        $erreur = "Un compte est déjà associé à cet adresse mail ! <a href=\"signin.php\">Me connecter</a>";
                    }
                } else {
                    $erreur = "Votre adresse mail n'est pas valide !";
                }
        } else {
            $erreur = "Veuillez remplir tout les champs !";
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>

    <div align="center">
        <h3>Inscription</h3>
        <br><br>

        <form action="signup.php" method="POST">
            <div class="form-floating mb-3">
                <input name="firstname" type="text" class="form-control" id="floatingInput" placeholder="Votre prénom" value="<?php if(isset($firstname)) {echo $firstname;} ?>">
                <label for="floatingInput">Prénom</label>
            </div>
            <div class="form-floating mb-3">
                <input name="name" type="text" class="form-control" id="floatingInput" placeholder="Votre nom" value="<?php if(isset($name)) {echo $name;} ?>">
                <label for="floatingInput">Nom</label>
            </div>
            <div class="form-floating mb-3">
                <input name="mail" type="email" class="form-control" id="floatingInput" placeholder="Votre mail" value="<?php if(isset($mail)) {echo $mail;} ?>">
                <label for="floatingInput">Mail</label>
            </div>
            <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="floatingInput" placeholder="Votre mot de passe">
                <label for="floatingInput">Mot de passe</label>
            </div>
            <div class="form-floating mb-3">
                <input name="passwordc" type="password" class="form-control" id="floatingInput" placeholder="Votre mot de passe">
                <label for="floatingInput">Confirmation mot de passe</label>
            </div>
            <input name="forminscription" class="btn btn-primary" type="submit" value="S'inscrire">
            
        </form>
        <br>
        <?php
            if(isset($erreur)){
                echo '<font color="red">' . $erreur . '</font>';
            }
        ?>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>