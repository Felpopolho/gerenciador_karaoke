<?php
    $server = 'localhost'; 
    $user = 'root'; 
    $password = ''; 
    $db = 'karaoke_da_casa';

    Function banco($server, $user, $password, $db, $consulta){
        $banco = new mysqli($server, $user, $password, $db);
        if ($banco -> connect_error) {
            echo "Falha de conexão de referência: (".$banco->connect_errno.") - ".$banco->connect_error;
            echo "<a href='incluir.php'> <img src='img/fundo/voltar.png' / width=4- heigth=40></a>";
            exit();
        }

        if (!$resultado = $banco->query($consulta)){
            echo "Falha na consulta referência: (".$banco->errno.") - ".$banco->error;
            echo "<a href='incluir.php'> <img src='img/fundo/voltar.png' / width = 40 heigth= 40> </a>";
            exit();
        }

        $banco->close();
        return $resultado;
    }

    Function banco_last_id($server, $user, $password, $db, $consulta){
        $banco = new mysqli($server, $user, $password, $db);
        if ($banco -> connect_error) {
            echo "Falha de conexão de referência: (".$banco->connect_errno.") - ".$banco->connect_error;
            echo "<a href='incluir.php'> <img src='img/fundo/voltar.png' / width=4- heigth=40></a>";
            exit();
        }

        if (!$resultado = $banco->query($consulta)){
            echo "Falha na consulta referência: (".$banco->errno.") - ".$banco->error;
            echo "<a href='incluir.php'> <img src='img/fundo/voltar.png' / width = 40 heigth= 40> </a>";
            exit();
        }
        
        $last_id = $banco->insert_id;

        $banco->close();
        return [$last_id];
    }