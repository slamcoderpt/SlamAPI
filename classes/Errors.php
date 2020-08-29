<?php
    class Errors
    {
        public static $html;

        public function invalid_request($status = 'Error', $error = 'REQUEST INVÁLIDO'){
            return json_encode(array($status => $error));
        }
    }
    
?>