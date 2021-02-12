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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 align="center">Panel Administration</h1>
    <br>
    <br>
    <div align="center">
        <ul class="btn-group">
            <a href="users.php" class="btn btn-primary">Users Managing</a>
            <a href="manage_product.php" class="btn btn-primary">Products Managing</a>
            <a href="manage_categ.php" class="btn btn-primary">Categories Managing</a>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>