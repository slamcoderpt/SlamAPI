<?php

    /*
     * Aqui serão definidas as variáveis GLOBAIS
     */
    $_CFG = array();

    $_CFG['ASSETS_DIR']     = "assets/";
    $_CFG['JS_DIR']         = $_CFG['ASSETS_DIR'] . "js/";
    $_CFG['CSS_DIR']        = $_CFG['ASSETS_DIR'] . "css/";
    $_CFG['CLASSES_DIR']    = "classes/";
    $_CFG['DATASETS_DIR']   = "datasets/";
    $_CFG['VIEW_DIR']       = "views/";

    $_CFG['THEME_LOGGED']   = "nicole_theme/";
    $_CFG['THEME_OUT']      = "nicole_full/";

    $_CFG['defaultAction']  = "Mainpage";
    $_CFG['defaultMethod']  = "index";
    $_CFG['fileExtension']  = ".php";
    $_CFG['loginAction']    = "Login";
    $_CFG['methodData']     = "Data";
    $_CFG['methodPrefix']   = "action_";

    $_CFG['MYSQL_TYPE']     = "mysql";
    $_CFG['MYSQL_HOST']     = "localhost";
    $_CFG['MYSQL_DBNAME']   = "_novanicole";
    $_CFG['MYSQL_USERNAME'] = "root";
    $_CFG['MYSQL_PASSWORD'] = "";

    define("ROOT_URL" , "http://localhost/SlamAPI/");

    define("MYSQL_PREFIX" , "altronix_");
    define("MYSQL_ROOT" , "admin_");

?>