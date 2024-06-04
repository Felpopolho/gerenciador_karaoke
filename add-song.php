<?php
    include "const.php";
    extract($_POST);

    if (!$song_name){
        echo "<script>alert('Preencha pelo menos o nome da música!')</script>";
        echo "<script>location.href='index.php'</script>";
        exit();
    }

    if (empty($song_singer)){
        $song_singer = "Não informado";
    }

    if (empty($costumer)){
        $costumer = "Não informado";
    }
    
    $consulta = "INSERT INTO song (name_song, name_singer, name_costumer) VALUES ('$song_name', '$song_singer', '$costumer')";

    $last_id = banco_last_id($server, $user, $password, $db, $consulta);
    $consulta = "UPDATE `song` SET `position`='".$last_id[0]."' WHERE id_song = ".$last_id[0]."";
    banco($server, $user, $password, $db, $consulta);
    header("Location: index.php");