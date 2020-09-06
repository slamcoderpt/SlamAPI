<?php
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
     * @model = array de dados necessários para o template
     * @module = modulo a ser renderizado. Ex:. Mainpage/view = Mainpage/view.php
     * @templateName = incluir template base
     */
    function render($model, $module, $templateName = '')
    {
        $template = explode('/', $module);

        if(SlamAPI::$SHOWHTML)
        {
            include(SlamAPI::$cfg['VIEW_DIR'] . $templateName . 'header.php');
            
            include(SlamAPI::$cfg['vIEW_DIR'] . $templateName . $template[0] . '/' . $template[1] . SlamAPI::$cfg['fileExtension']);

            include(SlamAPI::$cfg['VIEW_DIR'] . $templateName . 'footer.php');
        }
        else
        {
            json_encode($model);
        }
    }
?>