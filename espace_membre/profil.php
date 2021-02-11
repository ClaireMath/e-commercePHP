<?php
    session_start();

    $db = new PDO('mysql:host=127.0.0.1;port=8889;dbname=groupe8', 'root', 'root');

    if(isset($_SESSION['id']) && $_SESSION['id'] > 0){
        $getid = intval($_SESSION['id']);
        $requser = $db->prepare("SELECT * FROM membres WHERE numMembre = ?");
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body style="font-family:'Lato', sans-serif">

    <div align="center">
        <h3>Profil de <?php echo $userinfo['prenom']; ?></h3>
        <br><br>

        Prénom = <?php echo $userinfo['prenom']; ?>
        <br>
        Nom = <?php echo $userinfo['nom']; ?>
        <br>
        Mail = <?php echo $userinfo['email'] ?>
        <br>
        Role = <?php
        
        switch($userinfo['role']){
            case 0:
                echo "Visiteur";
                break;
            case 1:
                echo "Membre";
                break;
            case 2:
                echo "Administrateur (<a href=\"../admin/panel_admin.php\"> Panel Admin </a>)";
                break;
            default:
                echo "Visiteur";
        }?>
        <br>
        <?php
            if(isset($_SESSION['id']) && $userinfo['numMembre'] == $_SESSION['id']){
        ?>
        <a href="delete_profil.php">Supprimer mon compte</a>
        <br>
        <a href="logout.php">Se déconnecter</a>
        <?php
            }
        ?>

    </div>
    
</body>
</html>
<?php
    }
?>