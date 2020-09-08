<?php
    class Mainpage implements Classes
    {
        const REQUIRE_LOGIN = true;
        const MODULE        = "Página Inicial";

        public $errors = [];
        
        public $inputs = [];

        function action_index($dataset, Request $req)
        {
            $model = [
                "title" => SlamAPI::$cfg['app'],
                "moduleName" => self::MODULE,
            ];

            // Renderiza o módulo
            render($model, '', SlamAPI::$cfg['THEME_BASE_LOGGED']);
        }

        function action_delete($dataset, Request $req){}
        function action_update($dataset, Request $req){}
        function action_view($dataset, Request $req){}
    }
?>