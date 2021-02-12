<?php
    require_once('../init.php');

    function redirect_by_role($role, $url){
        header('Location: ' . $url);
    }
?>