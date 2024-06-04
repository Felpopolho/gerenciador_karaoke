<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Karaoke dA Casa</title>
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark mb-5">
      <!-- Logo -->
      <a href="" class="navbar-brand">Karaoke da A Casa</a>

      <!-- Menu Hamburguer -->
      <button class="navbar-toggler" data-toggle="collapse" 
      data-target="#navegacao2">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>

    <div class="m-auto" style="width: 70%">
      <?php
        include "const.php"; 
        $id_song = $_GET['song_id'];

        $consulta = "SELECT * FROM song WHERE id_song = '".$id_song."'";
        $resultado = banco($server, $user, $password, $db, $consulta);
        $linha = $resultado->fetch_assoc();

        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='song_id' value='".$linha['id_song']."'>";
        echo "<input type='text' class='form-control mb-2' name='song_name' value='".$linha['name_song']."'>";
        echo "<input type='text' class='form-control mb-2' name='song_singer' value='".$linha['name_singer']."'>";
        echo "<input type='text' class='form-control mb-2' name='costumer' value='".$linha['name_costumer']."'>";
        echo "<button class='btn btn-outline-success btn-block mt-3'>Editar</button>";
        echo "<a href='index.php' class='btn btn-outline-danger btn-block mt-3'>Cancelar</a>";
        echo "</form>";

        if ($_POST){
          extract($_POST);
          $consulta = "UPDATE song SET name_song = '$song_name', name_singer = '$song_singer', name_costumer = '$costumer' WHERE id_song = '".$song_id."'";
          banco($server, $user, $password, $db, $consulta);
          header("Location: index.php");
        }
      ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>