<?php 

try {
    // host: 188.34.153.174
    // user: groupe8
    // pasw: Super-Groupe8
    // dbname: groupe8
    // port: 3306
    // $bd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=groupe8', 'root', '');
    $bd = new PDO('mysql:host=127.0.0.1;port=8889;dbname=groupe8', 'root', 'root');
    // $bd = new PDO('mysql:host=188.34.153.174;port=3306;dbname=groupe8', 'groupe8', 'Super-Groupe8');
}
catch (Exception $e) {
    die('Erreur MySQL, maintenance en cours.' . $e->getMessage());
}

?>