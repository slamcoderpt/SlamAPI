<?php
    // Pequeno Easter Egg
    class SlamAPI
    {
        // Arrays
        public $request;
        public $cfg;
        public $allClasses;

        // Boolean
        public $showHtml = false;

        // String
        public $defaultAction = "Mainpage";
        public $defaultMethod = "Index";
        public $methodPrefix  = "action_";
        public $fileExtension = ".php";

        // PDO Connection
        public $MYSQL         = null;
        public $PHC           = null;

        /*
         * Inicialização da classe  
         * As conexões SQL são inicializadas e finalizadas no final do script
         * @request  = Parametros vindos do url;
         * @showHtml = Se verdadeiro mostra template html senão apenas json 
         * @params   = Array com parametros globais
         */
        function __construct($request, $showHtml, $params)
        {
            $this->request  = $request;
            $this->cfg      = $params;
            $this->showHtml = $showHtml;

            $this->MYSQL   = $this->get_db_instance($params['MYSQL_TYPE'], $params['MYSQL_HOST'], $params['MYSQL_DBNAME'], $params['MYSQL_USERNAME'], $params['MYSQL_PASSWORD']);
            
            $validRequest  = $this->validate_request($this->request);
            if(!$validRequest) $this->set_invalid_request($this->request);
            
            $this->load_module($this->request, $this->showHtml);

            $this->MYSQL   = null;
        }

        /*
         *  Função que estabelece a conexão com a base de dados
         *  Vai fazer conexão com ambos MYSQL e SQL SERVER
         *  @type = tipo de base de dados
         *  @host = endereço host da bd
         *  @dbname = nome da base de dados
         *  @username && @password = login de acesso
         */
        function get_db_instance($type, $host, $dbname, $username, $password)
        {
            try {
                $conn = new PDO($type.":host=".$host.";dbname=".$dbname, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $conn;
            } catch(PDOException $e) {
                return false;
            }
        }

        /*
         *  Esta função irá carregar todos os nomes dos modulos desenvolvidos
         *  Servirá posteriormente para verificação de classes vindas do REQUEST
         */
        function load_classes()
        {
            $this->allClasses = array_diff(scandir($this->cfg['CLASSES_DIR']), array('..', '.'));
        }

        /*
         *  Fazer o carregamento do modulo
         *  Selecionado através do request
         */
        function load_module(&$request, $html)
        {

            $this->load_headers($html);

            $module = new $request['action']();
            $method = $request['method'];
            $module::$html = $html;

            echo $module->$method();
        }

        /*
         * Colocar os headers indicados no início da página
         */
        function load_headers($html)
        {
            header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
            header('Pragma: no-cache'); // HTTP 1.0.
            header('Expires: 0'); // Proxies.

            if($html)  header("Content-Type: text/html; charset=UTF-8");
            if(!$html) header("Content-type: application/json; charset=utf-8");
        }

        /*
         * Invalidar o request ao colocar o action e o method 
         * direcionados para a classe dos Errors. Assim irá ter uma
         * página propria para representar os erros.
         */
        function set_invalid_request(&$request)
        {
            $request['action'] = "Errors";
            $request['method'] = "invalid_request";
        }

        /*
         *  Fazer a validação do request
         *  Faz o carregamento de todas as classes
         *  Verificando se existe a classe e o respetivo metodo
         *  Se a class ou o metodo forem vazio irá ser atribuido o index
         */ 
        function validate_request(&$request)
        {
            $this->load_classes();

            if(empty($request['action'])) $request['action'] = $this->defaultAction;
            if(empty($request['method'])) $request['method'] = $this->defaultMethod;

            $fileRequested = $request['action'].$this->fileExtension;
            if(in_array($fileRequested, $this->allClasses)) include($this->cfg['CLASSES_DIR'].$fileRequested);

            $request['method'] = $this->methodPrefix . $request['method'];

            $classExist  = class_exists($request['action']);
            $methodExist = method_exists($request['action'], $request['method']);

            return $classExist == $methodExist && $classExist == true;
        }
    }
?>