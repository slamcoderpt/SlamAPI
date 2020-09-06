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
    }
    
?>