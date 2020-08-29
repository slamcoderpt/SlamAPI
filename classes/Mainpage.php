<?php
    class Mainpage
    {
        public static $html;

        function action_index(){
            echo json_encode(array('teste' => 'teste'));
        }
    }
?>