<?php
    // Incluir ficheiro de Configurações
    require_once('cfg.php');
    // Incluir ficheiro do API
    require_once('slamapi.php');

    $API = new SlamAPI($_REQUEST, true, $_CFG);
?>