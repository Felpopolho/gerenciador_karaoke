<?php
    include "const.php";
    extract($_GET);

    $consulta = "DELETE FROM song WHERE id_song = '".$song_id."'";
    banco($server, $user, $password, $db, $consulta);
    header("Location: index.php");