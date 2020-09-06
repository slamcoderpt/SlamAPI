<?php
    interface Authenticate
    {
        // Processar o login
        public function action_login($dataset, Request $req);
        // Processar o logout
        public function action_logout($dataset, Request $req);
    }
?>