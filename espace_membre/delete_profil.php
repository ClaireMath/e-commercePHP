<?php
    session_start();

    $db = new PDO('mysql:host=127.0.0.1;port=8889;dbname=groupe8', 'root', 'root');

    if(isset($_SESSION['id'])){
        $requser = $db->prepare("DELETE FROM membres WHERE numMembre = ?");
        $requser->execute(array($_SESSION['id']));
        header('Location: logout.php');
    }
?>