<?php 

try {
    $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=groupe8', 'root', '');
}
catch (Exception $e) {
    die('Erreur MySQL, maintenance en cours.' . $e->getMessage());
}

?>