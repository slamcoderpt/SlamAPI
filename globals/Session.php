<?php
    class Session
    {

        public $logged = false;

        /*
         * Inicialização da sessão
         * @html = boolean que representa se é web(html) ou REST(json)
         */
        function __construct($html)
        {
            if($html) $this->load_session(); else $this->load_token(); 
        }

        /*
         * Destroy todas as variáveis da session e locais
         */
        function destroy_session()
        {
            session_destroy();
        }

        /*
         * Iniciar a sessão WEB
         */
        function load_session()
        {
            session_start();

            foreach($_SESSION as $key => $session)
            {
                $this->$key = $session;
            }

        }

        /*
         * Verifica se a sessão existente é válida
         */
        function valid_session($html)
        {
            if($html) return  $this->logged === true && isset($this->userid) 
                                && isset($this->active) && $this->active + 0 > 0;
                else return $this->logged;
        }

        /**********************************************************************************************************/
        /****************************************  REST API  ******************************************************/
        /**********************************************************************************************************/

        /*
         * Iniciar a sessão REST
         * @TODO : Criar sistema de tokens
         * após criar o modulo de Token Management
         */
        function load_token()
        {

        }

    }
    
?>