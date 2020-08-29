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

        /*
         * Inicialização da classe  
         * $request  = Parametros vindos do url;
         * $showHtml = Se verdadeiro mostra template html senão apenas json 
         */
        function __construct($request, $showHtml, $params)
        {
            $this->request = $request;
            $this->cfg = $params;
            $this->showHtml = $showHtml;
            
            $validRequest = $this->validate_request($this->request);
            if(!$validRequest) $this->set_invalid_request($this->request);
            
            $this->load_module($this->request, $this->showHtml);
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
    }
?>