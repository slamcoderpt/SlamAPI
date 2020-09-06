<?php
    interface Classes
    {
        // Resultados gerais
        public function action_index($dataset, Request $req);
        // Resultado unico normalmente baseado no id
        public function action_view($dataset, Request $req);
        // Ao atualizar
        public function action_update($dataset, Request $req);
        // Ao eliminar
        public function action_delete($dataset, Request $req);
    }
?>