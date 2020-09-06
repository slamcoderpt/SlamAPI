<?php
    class Mainpage implements Classes
    {
        const REQUIRE_LOGIN = true;

        function action_index($dataset, Request $req)
        {
            $dataset::display_text();
        }

        function action_delete($dataset, Request $req){}
        function action_update($dataset, Request $req){}
        function action_view($dataset, Request $req){}
    }
?>