<?php
    class Login implements Classes, Authenticate
    {
        const REQUIRE_LOGIN = false;

        function action_index($dataset, Request $req)
        {
            // Se conta estiver aberta redireciona para a Mainpage
            if(SlamAPI::$SESSION->logged) redirectTo('Mainpage');
  
            echo "Not logged in";
        }

        function action_login($dataset, Request $req)
        {

        }

        function action_logout($dataset, Request $req)
        {
            
        }

        function action_view($dataset, Request $req){}
        function action_update($dataset, Request $req){}
        function action_delete($dataset, Request $req){}

    }
?>