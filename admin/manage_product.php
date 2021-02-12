<h1 align="center">
    Liste Produits
</h1><br>

<?php
    session_start();
    
    // $bd = new PDO('mysql:host=127.0.0.1;port=8889;dbname=groupe8', 'root', 'root');
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
    // require('../utils/articles_managing.php');
    // print_r($_POST);
    if(empty($_POST['addImage'])){
        $_POST['addImage'] = "/";
    }
    if(isset($_POST['add_prod'])){
        if(!empty($_POST['addName']) && !empty($_POST['addDesc']) && !empty($_POST['addCateg'])
        && !empty($_POST['addImage']) && !empty($_POST['addPrix'])){
            $name = $_POST['addName'];
            $desc = $_POST['addDesc'];
            $categ = $_POST['addCateg'];
            $img = $_POST['addImage'];
            $prix = $_POST['addPrix'];
            intval($prix);

            $addreq = $bd->prepare('INSERT INTO articles (nomArticle, description, categorie, image, prix) VALUES (?, ?, ?, ?, ?)');
            $addreq->execute(array($name, $desc, $categ, $img, $prix));

        }
    }
    if(isset($_POST['modif_prod'])){
        // header('Location: manage_product.php?numArticle=' . $_POST['numArticle']);
        if(!empty($_POST['modifName']) && !empty($_POST['modifDesc']) && !empty($_POST['modifCateg'])
        && !empty($_POST['modifImage']) && !empty($_POST['modifPrix']))
            $name = $_POST['modifName'];
            $desc = $_POST['modifDesc'];
            $categ = $_POST['modifCateg'];
            $img = $_POST['modifImage'];
            $prix = $_POST['modifPrix'];
            $id = $_POST['numArticle'];
            intval($id);
            floatval($prix);

            $modreq = $bd->prepare('UPDATE articles SET nomArticle = ?, description = ?, categorie = ?, image = ?, prix = ? WHERE numArticle = ?');
            $modreq->execute(array($name, $desc, $categ, $img, $prix, $id));
    }
    if(isset($_POST['suppr_prod'])){
        // header('Location: manage_product.php?numArticle=' . $_POST['numArticle']);
        if(!empty($_POST['modifName']) && !empty($_POST['modifDesc']) && !empty($_POST['modifCateg'])
        && !empty($_POST['modifImage']) && !empty($_POST['modifPrix']))
            $name = $_POST['modifName'];
            $desc = $_POST['modifDesc'];
            $categ = $_POST['modifCateg'];
            $img = $_POST['modifImage'];
            $prix = $_POST['modifPrix'];
            $id = $_POST['numArticle'];
            intval($id);
            floatval($prix);

            delete_prod($id);
    }
?>

<table width="100%" style="font-family: sans-serif">
    <thead>
        <td align="left">ID</td>
        <td align="left">PRODUIT</td>
        <td align="left">DESC</td>
        <td align="left">CATEGORIE</td>
        <td align="left">IMAGE</td>
        <td align="left">PRIX</td>
        <td></td>
    </thead>
    <form action="manage_product.php" method="post">
        <?php
            $req = $bd->query('SELECT * FROM articles ORDER BY categorie');
            while($article = $req->fetch()){
                ?>
                <tr>
                    <td><input readonly="readonly" name="numArticle" type="text" value="<?= $article['numArticle'];?>"></td>
                    <td><input name="modifName" type="text" value="<?= $article['nomArticle']; ?>"/></td>
                    <td><input name="modifDesc" type="text" value="<?= $article['description']; ?>"></td>
                    <td><input name="modifCateg" type="text" value="<?= $article['categorie']; ?>"></td>
                    <td><input name="modifImage" type="text" value="<?= $article['image']; ?>"></td>
                    <td><input name="modifPrix" type="text" value="<?= $article['prix']; ?>"></td>
                    <td><input name="modif_prod" type="submit" value="Modifier"></td>
                    <td><input name="suppr_prod" type="submit" value="Supprimer"></td>
                </tr>

                <?php
            }
        ?>
    </form>
    <form action="manage_product.php" method="post">
        <tfoot>
            <tr>
                <td></td>
                <td><input name="addName" type="text"></td>
                <td><input name="addDesc" type="text"></td>
                <td><input name="addCateg" type="text"></td>
                <td><input name="addImage" type="text"></td>
                <td><input name="addPrix" type="text"></td>
                <td><input name="add_prod" type="submit" value="Aouter"></td>
            </tr>
        </tfoot>
    </form>
</table>