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
?>