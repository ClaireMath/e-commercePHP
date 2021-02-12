<?php

    
    require('../init.php');
    // echo "test";
    $stats = $bd->query('SELECT * FROM articles WHERE categorie = "plat"');
    while($article = $stats->fetch()){
        
        echo '<div class="image1 produit">';
        echo '<img class="imgentree1"  src=' . $article['image'] . ' width="22%" height="22%">';
        echo '<p class="titre" style="color:white">' . $article['nomArticle'] . '</p>';
        echo '<hr>';
        echo '<p class="description" style="color:white">' . $article['description'] . '</p>';
        echo '<hr>';
        echo '<p class="prix" style="color:white">' . $article['prix'] . '€</p> ';
        echo '</div>';
    }



?>


