<?php

    class LoginData
    {
        // Aqui situam-se todas a queries utilizadas neste modulo
        const SQL = [
            'VALIDATE_CREDENTIALS' => 'SELECT passwordhash FROM ' . MYSQL_ROOT . 'users  
                                      WHERE user_name = :username 
                                      AND active > 0',
                                      
            'GET_USER_ID'          => 'SELECT id_user FROM ' . MYSQL_ROOT . 'users 
                                      WHERE user_name = :username',
        ];

      /*
       * Obtem o id do utilizador baseado no username
       */
       function get_user_id($username)
       {
            $query = SlamAPI::$MYSQL->prepare(self::SQL['GET_USER_ID']);
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetchColumn();

            return $result + 0;
       }

       /*
        * Faz a verificação das credenciais introduzidas pelo user com a base de dados
        * @username = nome de utilizador
        * @password = password/senha/palavra-passe
        */
        function valid_credentials($username, $password)
        {
             $query = SlamAPI::$MYSQL->prepare(self::SQL['VALIDATE_CREDENTIALS']);
             $query->bindParam(':username', $username, PDO::PARAM_STR);
             $query->execute();
             $hashedPassword = $query->fetchColumn();

             if($hashedPassword === false) return false;
 
             return password_verify($password, $hashedPassword);
        } 

    }

?>