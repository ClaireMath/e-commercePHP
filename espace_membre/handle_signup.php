<?php

    require_once('init.php');
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
                    $reqmail = $bd->prepare("SELECT * FROM membres WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0){
                        if($password == $passwordc){
                            $insertmbr = $bd->prepare("INSERT INTO membres(nom, prenom, email, password) VALUES (?, ?, ?, ?)");
                            $insertmbr->execute(array($firstname, $name, $mail, $password));
                            
                            // header('Location: signup.php?success=true');
                            $erreur = "Votre compte a bien été créé ! <a href=\"signin.php\">Me connecter</a>";
                        } else {
                            header('Location: signup.php?error=passError');
                            // $erreur = "Vos mots de passes ne correspondent pas !";
                        }
                    } else {
                        header('Location: signup.php?error=alreadyExist');
                        // $erreur = "Un compte est déjà associé à cet adresse mail !";
                    }
                } else {
                    header('Location: signup.php?error=badmail');
                    // $erreur = "Votre adresse mail n'est pas valide !";
                }
            } else {
                header('Location: signup.php?error=empty');
                // $erreur = "Veuillez remplir tout les champs !";
            }
    }

    // require_once('handle_signup.php');
    // if(isset($_GET['error'])){
    //     switch ($_GET['error']){
    //         case 'empty':
    //             $erreur = "Veuillez remplir tout les champs !";
    //             break;
    //         case 'badmail':
    //             $erreur = "Votre adresse mail n'est pas valide !";
    //             break;
    //         case 'alreadyExist':
    //             $erreur = "Un compte est déjà associé à cet adresse mail !";
    //             break;
    //         case 'passError':
    //             $erreur = "Vos mots de passes ne correspondent pas !";
    //             break;
    //     }
    // } 
?>