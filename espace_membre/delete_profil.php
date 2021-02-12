<?php
    session_start();

    require('../init.php');

    if(isset($_SESSION['id'])){
        $requser = $bd->prepare("DELETE FROM membres WHERE numMembre = ?");
        $requser->execute(array($_SESSION['id']));
        header('Location: logout.php');
    }
?>