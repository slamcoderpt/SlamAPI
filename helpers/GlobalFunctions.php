<?php
    
    /* 
     * Converte keys do array para variáveis
     * @array = array
     */
    function array_to_object($array, &$object)
    {
        foreach($array as $key => $arr)
        {
            $object->$key = $arr;
        }
    }

    /*
     *  Converte array em elemento html
     *  Será util para construção de URL GET
     *  @array = array com keys(obrigatório ser string)
     *  @ignore = keys a ser ignoradas
     */
    function array_to_element($array, $ignore = [])
    {
        $return = '';
        foreach ($array as $key => $arr) 
        {
            if(in_array($key, $ignore)) continue;
            $return .= "${key}='".get_var($arr)."'";
        } 

        return $return;
    }

    /*
     * Retorna a string da função a usar para validar o tipo de variavel
     * @type = tipo de variável
     */
    function data_type_function($type)
    {
        switch ($type) {
            case 'string':
                return 'is_string';
                break;
            
            case 'int':
                return "is_integer";
                break;
            case 'decimal':
                return "is_numeric";
                break;
        }
    }    

    /*
     * Faz o mesmo que o explode e implode com keys personalizadas
     * @string      = string a dividir
     * @delimeter   = delimitador que vai separar a string
     * @keys        = keys que vão ser associadas nas strings separadas
     * @ignore      = keys a ser ignoradas
     */
    function explode_to_element($string, $delimeter, $keys, $ignore = []){
        $array  = explode($delimeter, $string);
        $return = '';

        if(count($array) <= 0) return $string;

        foreach ($array as $key => $ret) 
        {
            if(in_array($keys[$key], $ignore)) continue;
            $separator = $key < count($array) - 1 ? '&' : '';

            $return .= $keys[$key] . '=' . $ret . $separator;
        }

        return $return;
    }

    /*
     * Retorna variável se existir senão retorna vazio
     * @var = variável
     */
    function get_var(&$var)
    {
        return $var ?: '';
    }

    /*
     * Verica se o array não está vazio
     * Retorna true se não estiver vazio
     * @erros = array de erros
     */
    function has_errors($errors)
    {
        return count($errors) > 0;
    }
    
    /*
     * Função para redirecionar para outra página
     * @class  = classe da página destino
     * @method = método da página destino
     * @other  = outros parametros de request
     */
    function redirectTo($class, $method = 'index', $other = '')
    {
        header('Location: ' . ROOT_URL . 'index.php?action=' . $class . '&method=' . $method . $other);
    }

    /*
     * Renderiza o template
     * @tmpModel = array de dados necessários para o template
     * @content = pagina a ser renderizada dentro do template
     * @base = incluir template base
     */
    function render($tmpModel, $content, $base, $allowJSON = false)
    {
        if(SlamAPI::$SHOWHTML)
        {
            $model = new stdClass();
            array_to_object($tmpModel, $model);
            include(SlamAPI::$cfg['VIEW_DIR'] . SlamAPI::$cfg['THEME'] . $base);
            $content = SlamAPI::$cfg['VIEW_DIR'] . SlamAPI::$cfg['THEME'] . $content . SlamAPI::$cfg['fileExtension'];
        }
        else
        {
            if($allowJSON) json_encode($model);
        }
    }

    /*
     * Inclui o ficheiro de content do template se o mesmo existir
     * @content = caminho do ficheiro content
     */
    function render_content($content)
    {
        if(file_exists($content)) include($content);
    }

    /*
     * Valida os dados de acordo com a categoria atribuida
     * @inputs = array com [keys] dos inputs e [value] com o tipo de variável
     * @request= request de onde vem os dados a verificar
     * @errors = variável de erros para depois mostrar o erro no render
     */
    function validate_inputs($inputs, Request $request, &$errors)
    {
        foreach ($inputs as $key => $dataType) 
        {
            if(count($errors) > 0) return;
            if(empty(get_var($request->$key))) $errors[$key] = true;
            $typeFunction = data_type_function($dataType);
            if(!$typeFunction($request->$key)) $errors[$key] = true;
        }
    }

?>