<?php
    class Login implements Classes, Authenticate
    {
        const REQUIRE_LOGIN = false;
        const TITLE         = "Login";

        public $errors = [];
        
        public $inputs = [
                        'f_utilizador' => 'string',
                        'f_password'   => 'string',   
                        ];

        function action_index($dataset, Request $req)
        {
            // Se conta estiver aberta redireciona para a Mainpage
            if(SlamAPI::$SESSION->logged) redirectTo('Mainpage');

            // Atribuir as variaveis visiveis no view
            $model = ["title" => SlamAPI::$cfg['app'] . ' - ' .self::TITLE,
                      "errors"=> $this->errors];

            // Renderiza o módulo
            render($model, '', SlamAPI::$cfg['THEME_BASE_LOGIN']);
        }

        function action_login($dataset, Request $req)
        {
            //Validar se foi submetido o form
            if(!$req->post()) redirectTo(get_class($this));

            // Validar os inputs
            validate_inputs($this->inputs, $req, $this->errors);

            // Se conta estiver aberta redireciona para a Mainpage
            if(SlamAPI::$SESSION->logged) redirectTo('Mainpage');

            // Verifica se as credenciais são válidas
            if(!has_errors($this->errors) && $dataset->valid_credentials($req->f_utilizador, $req->f_password)){
                // Obter o id do utilizador
                $id = $dataset->get_user_id($req->f_utilizador);

                // Criar a sessão
                SlamAPI::$SESSION->create_session($id);

                // Redirecionar para a Mainpage
                redirectTo(SlamAPI::$cfg['defaultAction']);
            }

            // Se chegou até aqui é porque algum erro ocorreu
            $this->errors['f_utilizador']   = "Inválido";
            $this->errors['f_password']     = "Inválido";

            // Se chegou até aqui é porque existem erros
            $model = ["title" => SlamAPI::$cfg['app'] . ' - ' .self::TITLE,
                      "errors" => $this->errors];

            // Renderiza o módulo
            render($model, '', SlamAPI::$cfg['THEME_BASE_LOGIN']);

        }

        function action_logout($dataset, Request $req)
        {
            // Destroi a sessão
            SlamAPI::$SESSION->destroy_session();
            redirectTo(SlamAPI::$cfg['defaultAction']);
        }

        // Funções requesitadas pela interface mas não usadas
        function action_create($dataset, Request $req){}
        function action_delete($dataset, Request $req){}
        function action_update($dataset, Request $req){}
        function action_view($dataset, Request $req){}

    }
?>