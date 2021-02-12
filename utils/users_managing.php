<?php
    require('../init.php');
    function delete_user($id){
        $req = $bd->prepare('DELETE FROM membres WHERE numMembre = ?');
        $req->execute(array($id));
    }

    function change_role($role){
        
        switch($role){
            case 1:
                $req_update = $bd->prepare('UPDATE membres SET role = ?');
                $req_update->execute(array($role+1));
                break;
            case 2:
                $req_update = $bd->prepare('UPDATE membres SET role = ?');
                $req_update->execute(array($role-1));
                break;
        }
        header('Location: users.php');
    }
    
?>