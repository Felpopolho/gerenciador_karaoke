<?php
    include "const.php";
    extract($_GET);

    $consulta = "UPDATE `song` SET `status`='1' WHERE id_song = $song_id";

    banco($server, $user, $password, $db, $consulta);
    header("Location: index.php");