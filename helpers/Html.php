<?php
    class Html 
    {
        const FORM_DEFAULT_POST = "post"; 

        /*
         * Iniciar formulário
         * @params = parametros do formulario
         * @params[] = id, class, style, action, type
         */
        public static function form_init($params)
        {
            $form   = '<form ';
            $form  .= array_to_element($params, ['type', 'action']);

            $type   = !empty(get_var($params['type'])) ? get_var($params['type']) 
                                                       : self::FORM_DEFAULT_POST;

            $action = explode_to_element(get_var($params['action']), '/', ['action', 'method']);
                
            $form  .= 'action="index.php?'.$action.'" method="'. $type . '" >';

            echo $form;
        }

        /*
         * Finalizar o formulário
         */
        public static function form_end()
        {
            echo "</form>";
        }

        /*
         *  Mostrar texto
         *  @value    = texto a demonstrar
         *  @params   = parametros do texto
         */
        public static function text($value, $params)
        {
            $text  = '<' . $params['type'] . ' ';
            $text .= array_to_element($params, ['type']);  
            $text .= ">${value}</".get_var($params['type']).">";

            if( get_var($params['return']) === true ) return $text; else echo $text;
        }

        /*
         *  Mostrar caixas de inputs e respetivos erros se existirem
         *  @modelItem = array com dados a pre-preencher
         *  @params    = parametros do input
         */ 
        public static function input($modelItem, $params)
        {
            $errorText  = '';
            $formGroup  = '';
            $input      = '';

            // Verifica se existem erros
            if(count($modelItem->errors) > 0)
            {
                // Classe do aviso de sucesso e texto a apresentar
                $formGroup = ' label-floating has-success';
                $errorText = 'Input Válido';

                // Verifica se existe um campo de erro para este elemento específico
                if( !empty(get_var($modelItem->errors[$params['name']])) ) 
                {
                    // Existe erro. Atribui a classe de erro e carrega a mensagem que vem do model->errors
                    $formGroup = ' label-floating has-danger';
                    $errorText = get_var($modelItem->errors[$params['name']]);
                }
            }
            
            $input .= '<div class="' . get_var($params['form-group-class']) . $formGroup . '">';

            // Se o parametro error-control estiver ativado e existir erros
            if( get_var($params['error-control']) === true && count($modelItem->errors) > 0) 
            {
                //Mostra as labels com o erro
                $input .= Html::text($errorText, 
                                    ['type' => 'label', 
                                    'class' => 'control-label', 
                                    'return'=> true
                                    ]);
            }

            //Criação do input
            $inputName = get_var($params['name']);

            $input .= '<input ';
            $input .= array_to_element($params, ['error-control', 'form-group-class']);     
            $input .= !empty(get_var($params['name'])) && isset($modelItem->request->$inputName) 
                                            ? "value='".$modelItem->request->$inputName."'" 
                                            : "value='".get_var($params['value'])."'";
            $input .= '>';

            $input .= '</div>';

            //@TODO: Criar sistema de erros -> estético | em progresso

            if( get_var($params['return']) === true ) return $input; else echo $input;

        }

        /*
         *  Mostrar botões
         *  @value  = texto a mostrar no botão
         *  @params = parametros do botão
         */
        public static function button($value, $params)
        {
           $button  = '<button ';
           $button .= array_to_element($params);
           $button .= '>';
           $button .= $value;
           $button .= '</button>';

           if( get_var($params['return']) === true ) return $button; else echo $button;
        }
    }
?>