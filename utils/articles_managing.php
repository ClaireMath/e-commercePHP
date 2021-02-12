<?php
    require('../init.php');

    function delete_prod($id){
        global $bd;
        $req_delete = $bd->prepare('DELETE FROM articles WHERE numArticle = ?');
        $req_delete->execute(array($id));
    }

    
?>