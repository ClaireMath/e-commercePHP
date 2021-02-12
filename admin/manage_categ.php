<?php
    session_start();
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
    require('../init.php');
    
?>

<h1 align="center">Manage Categories</h1>

<table align="center">
    <thead>
        <td align="left">CATEGORIE</td>
        <td><a href="manage_categ.php?add=true"><button>Add</button></a></td>
    </thead>
    <?php
        
        $req = $bd->query('SELECT categorie FROM articles GROUP BY categorie');
        while($categ_info = $req->fetch()){
            ?>
            <tr>
                <td align="left"><?= strtoupper($categ_info['categorie']) ?></td>
                <td align="left"><a href="manage_categ.php?rename=true">Rename</a></td>
                <td align="left"><a href="manage_categ.php?delete=true">Delete</a></td>
                <br>
            </tr>
            <?php
        }
        if(isset($_GET['add']) && $_GET['add'] == "true"){
            ?>
                <tr>
                    <td><input type="text" placeholder="Categorie"></td>
                    <!-- <td></td>
                    <td></td> -->
                    <td><input name="addCateg" type="submit" value="Add"></td>
                </tr>
            <?php
        }
    ?>
</table>