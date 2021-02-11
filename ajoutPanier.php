
<?php

session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

array_push($_SESSION['panier'], "taValeur");

header('Location: tonfichier.php');

exit();

