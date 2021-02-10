<?php 

try {
    $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=groupe8', 'root', '');
    $bd = new PDO('mysql:host=127.0.0.1;port=8889;dbname=groupe8', 'root', 'root');
}
catch (Exception $e) {
    die('Erreur MySQL, maintenance en cours.' . $e->getMessage());
}

?>