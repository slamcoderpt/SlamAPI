<?php
    class Request
    {
        function __construct()
        {
            foreach ($_REQUEST as $key => $request) 
            {
                $this->$key = $request;
            }

        }

        function post()
        {
            return count($_POST) > 0;
        }

        function get()
        {
            return count($_GET) > 0;
        }
    }
    
?>