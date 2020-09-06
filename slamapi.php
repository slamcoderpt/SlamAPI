<?php
    // Pequeno Easter Egg
    class SlamAPI
    {
        // Arrays
        public $request;
        public $allClasses;
        public $allDatasets;
        public static $cfg;

        // Boolean
        public static $SHOWHTML = false;

        // PDO Connection
        public static $MYSQL         = null;
        public static $PHC           = null;

        // Request e Session
        public $REQUEST              = null;
        public static $SESSION       = null;

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
            self::$cfg      = $params;
            self::$SHOWHTML = $showHtml;

            self::$MYSQL    = $this->get_db_instance($params['MYSQL_TYPE'], $params['MYSQL_HOST'], $params['MYSQL_DBNAME'], $params['MYSQL_USERNAME'], $params['MYSQL_PASSWORD']);
            
            $validRequest   = $this->validate_request($this->request);
            
            if($validRequest) $this->load_module($this->request, self::$SHOWHTML); else redirectTo(self::$cfg['defaultAction'], self::$cfg['defaultMethod']);

            self::$MYSQL    = null;
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
            try 
            {
                $conn = new PDO($type.":host=".$host.";dbname=".$dbname, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $conn;
            } 
            catch(PDOException $e) 
            {
                return false;
            }
        }

        /*
         *  Esta função irá carregar todos os nomes dos modulos desenvolvidos incluindo datasets
         *  Servirá posteriormente para verificação de classes vindas do REQUEST
         */
        function load_classes()
        {
            $this->allClasses  = array_diff(scandir(self::$cfg['CLASSES_DIR']), array('..', '.'));
            $this->allDatasets = array_diff(scandir(self::$cfg['DATASETS_DIR']), array('..', '.'));
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
         *  Fazer o carregamento do modulo e respetivo dataset
         *  Selecionado através do request
         *  Verifica também se a sesão está iniciada
         */
        function load_module(&$request, $html)
        {
            $this->load_headers($html);

            self::$SESSION        = new Session(self::$SHOWHTML);
            $this->REQUEST        = new Request();

            $module         = new $request['action']();
            $dataset        = $request['action'].self::$cfg['methodData'];
            $moduleData     = new $dataset();
            $method         = $request['method'];
            
            if(!self::$SESSION->valid_session(self::$SHOWHTML) && $module::REQUIRE_LOGIN) redirectTo(self::$cfg['loginAction']);
            echo $module->$method($moduleData, $this->REQUEST);
        }

        /*
         *  Fazer a validação do request
         *  Faz o carregamento de todas as classes
         *  Verificando se existe a classe , respetivo dataset e metodo de entrada
         *  Se a class ou o metodo forem vazio irá ser atribuido o index
         */ 
        function validate_request(&$request)
        {
            $this->load_classes();

            if(empty($request['action'])) $request['action'] = self::$cfg['defaultAction'];
            if(empty($request['method'])) $request['method'] = self::$cfg['defaultMethod'];

            $fileRequested      = $request['action'].self::$cfg['fileExtension'];
            $datasetRequested   = $request['action'].self::$cfg['methodData'].self::$cfg['fileExtension'];

            if(in_array($fileRequested, $this->allClasses)) include(self::$cfg['CLASSES_DIR'].$fileRequested);
            if(in_array($datasetRequested, $this->allDatasets)) include(self::$cfg['DATASETS_DIR'].$datasetRequested);

            $request['method'] = self::$cfg['methodPrefix'] . $request['method'];

            $classExist  = class_exists($request['action']);
            $methodExist = method_exists($request['action'], $request['method']);

            return $classExist == $methodExist && $classExist == true;
        }
    }
?>