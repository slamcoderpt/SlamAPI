<?php
    class Session
    {

        public $logged = false;

        const SQL = ['IS_USER_ACTIVE' => 'SELECT active FROM '.MYSQL_ROOT.'users 
                                          WHERE id_user = :userid'];

        /*
         * Inicialização da sessão
         * @html = boolean que representa se é web(html) ou REST(json)
         */
        function __construct($html)
        {
            if($html) $this->load_session(); else $this->load_token(); 
        }

        /*
         * Criar uma sessão para o utilizador
         */
        function create_session($userid)
        {
            $_SESSION['logged'] = true;
            $_SESSION['userid'] = $userid;
        }

        /*
         * Destroy todas as variáveis da session e locais
         */
        function destroy_session()
        {
            session_destroy();
        }

        /*
         * Verifica se o utilizador tem a conta ativa
         * @userid = id do utilizador
         */
        function is_active($userid)
        {
            $query = SlamAPI::$MYSQL->prepare(self::SQL['IS_USER_ACTIVE']);
            $query->bindParam(':userid', $userid, PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetchColumn();

            return $res + 0 > 0;
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

            // Destroi imediatamente a sessão se o utilizador deixar de estar ativo
            if(isset($this->userid) && $this->is_active($this->userid) === false) 
                $this->destroy_session();

        }

        /*
         * Verifica se a sessão existente é válida
         * @html = true -> html ; false = json
         */
        function valid_session($html)
        {
            if($html) return  $this->logged === true && isset($this->userid);
                 else return  $this->logged;
        }

        /***************************************************************************/
        /******************************  REST API  *********************************/
        /***************************************************************************/

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