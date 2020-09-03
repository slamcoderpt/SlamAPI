<?php
    class Mainpage
    {
        public static $html;

        function action_index($dataset){
            $dataset::display_text();
        }
    }
?>