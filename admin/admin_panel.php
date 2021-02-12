<?php
    session_start();
    require('../init.php');

    if(isset($_SESSION['id'])){
        switch($_SESSION['role']){
            case 0:
                redirect_by_role(0, "../espace_membre/signup.php");
                break;
            case 1:
                redirect_by_role(1, "../espace_membre/signin.php");
                break;
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="users.php">Users Managing</a></li>
            <li><a href="manage_product.php">Products Managing</a></li>
            <li><a href="manage_categ.php">Categories Managing</a></li>
        </ul>
    </header>
    
</body>
</html>