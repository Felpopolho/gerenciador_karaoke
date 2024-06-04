<?php
    include "const.php";
    extract($_GET);

    if($func == 0){
        $consulta = "SELECT position FROM song ORDER BY position ASC";
        $resultado = banco($server, $user, $password, $db, $consulta);
        $arrayobj = [];
        $resultado = $resultado->fetch_all();

        for($i = 0; $i < count($resultado); $i++){
            array_push($arrayobj, $resultado[$i][0]);
        }
        print_r($arrayobj);

        $key = array_search($song_position, $arrayobj);

        if($key == 0){
            echo "<script>alert('Esta já é a próxima música!')</script>";
            echo "<script>location.href='index.php'</script>";
            exit;
        }

        
    }elseif($func = 1){
        $consulta = "SELECT position FROM song ORDER BY position DESC";
        $resultado = banco($server, $user, $password, $db, $consulta);
        $arrayobj = [];
        $resultado = $resultado->fetch_all();

        for($i = 0; $i < count($resultado); $i++){
            array_push($arrayobj, $resultado[$i][0]);
        }
        print_r($arrayobj);

        $key = array_search($song_position, $arrayobj);

        if($arrayobj[$key] == $arrayobj[0]){
            echo "<script>alert('Esta já é a última música!')</script>";
            echo "<script>location.href='index.php'</script>";
            exit;
        }
    }

    $consulta = "UPDATE `song` SET `position`='0' WHERE position = ".($arrayobj[$key-1])."";
    banco($server, $user, $password, $db, $consulta);
    $consulta = "UPDATE `song` SET `position`='".($arrayobj[$key-1])."' WHERE position = ".$arrayobj[$key]."";
    banco($server, $user, $password, $db, $consulta);
    $consulta = "UPDATE `song` SET `position`='".($arrayobj[$key])."' WHERE position = '0'";
    banco($server, $user, $password, $db, $consulta);
    
    
    header("Location: index.php");