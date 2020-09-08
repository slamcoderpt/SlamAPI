<?php
    //@TODO: fazer a importação numa função/classe
    // Incluir ficheiro de Configurações
    require_once('cfg.php');
    // Funções gerais
    require_once('helpers/GlobalFunctions.php');
    require_once('helpers/Html.php');
    require_once('helpers/Request.php');
    require_once('helpers/Session.php');
    // Interfaces
    require_once('interfaces/Authenticate.php');
    require_once('interfaces/Classes.php');
    // Incluir ficheiro do API
    require_once('slamapi.php');

    $API = new SlamAPI($_REQUEST, true, $_CFG);
?>