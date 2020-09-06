<?php
    class Mainpage
    {
        const REQUIRE_LOGIN = true;

        function action_index($dataset)
        {
            $dataset::display_text();
        }
    }
?>