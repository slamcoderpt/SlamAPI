<?php
    // Incluir ficheiro de Configurações
    require_once('cfg.php');
    // Funções gerais
    require_once('globals/GlobalFunctions.php');
    require_once('globals/Session.php');
    // Incluir ficheiro do API
    require_once('slamapi.php');

    $API = new SlamAPI($_REQUEST, true, $_CFG);
?>