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
    if(isset($_GET['action']) && isset($_GET['id'])){
        if($_GET['action'] == 'delete'){
            $req = $bd->prepare('DELETE FROM membres WHERE numMembre = ?');
            $req->execute(array($_GET['id']));
            header('Location: users.php');
        } else if($_GET['action'] == "changerole" && isset($_GET['role'])){
            switch($_GET['role']){
                case 1:
                    $req_update = $bd->prepare('UPDATE membres SET role = ? WHERE numMembre = ?');
                    $req_update->execute(array($_GET['role']+1, $_GET['id']));
                    header('Location: users.php');
                    break;
                case 2:
                    $req_update = $bd->prepare('UPDATE membres SET role = ? WHERE numMembre = ?');
                    $req_update->execute(array($_GET['role']-1, $_GET['id']));
                    header('Location: users.php');
                    break;
            }
        }
    }
?>

<h1 style="font-family: sans-serif;text-align:center">Users Managing</h1>

<table width="80%" style="font-family: sans-serif">
    <thead>
        <td align="left">ID</td>
        <td align="left">NOM</td>
        <td align="left">PRENOM</td>
        <td align="left">EMAIL</td>
        <td align="left">ROLE</td>
        <td align="left">DATE INSCRIPTION</td>
        <td align="left">CHANGE ROLE</td>
        <td align="left">DELETE</td>
    </thead>
    <?php
        require('../utils/users_managing.php');
        // $bd = new PDO('mysql:host=127.0.0.1;port=8889;dbname=groupe8', 'root', 'root');
        $users_info = $bd->query('SELECT * FROM membres WHERE role > 0 ORDER BY numMembre');
        while($user = $users_info->fetch()){
            ?>
            <tr>
                <td align="left"><?php echo $user['numMembre'] ?></td>
                <td align="left"><?php echo $user['nom'] ?></td>
                <td align="left"><?php echo $user['prenom'] ?></td>
                <td align="left"><?php echo $user['email'] ?></td>
                <td align="left"><?php 
                switch($user['role']){
                    case 1:
                        echo "Membre";
                        break;
                    case 2:
                        echo "Administrateur";
                        break;
                } ?></td>
                <td align="left"><?php echo $user['created_at'] ?></td>
                <td align="left">
                    <a href=<?php echo "users.php?action=changerole&id=" . $user['numMembre'] . "&role=" . $user['role'];?>>
                        <?php
                            switch($user['role']){
                                case 1:
                                    echo "to Admin";
                                    break;
                                case 2:
                                    echo "to Membre";
                                    break;
                            }
                        ?>
                    </a>
                </td>
                <td><a href=<?php echo "users.php?action=delete&id=" . $user['numMembre'];?>>Delete</a></td>
            </tr>
            
            <?php
        }
    ?>
</table>