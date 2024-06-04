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

      <!-- navegacao -->
      <div class="collapse navbar-collapse" id="navegacao2">
        <!-- Formulário -->
        <form class="form-inline ml-auto" method="post" action="add-song.php">
          <input type="text" class="form-control mr-2" placeholder="Música" name="song_name">
          <input type="text" class="form-control mr-2" placeholder="Cantor" name="song_singer">
          <input type="text" class="form-control mr-2" placeholder="Cliente" name="costumer">
          <button class="btn btn-outline-success">Adicionar</button>
        </form>
      </div>
    </nav>

    <div class="m-auto" style="width: 70%">
      <table class="table">
        <thead>
          <tr>
            <th>Música</th>
            <th>Cantor</th>
            <th>Cliente</th>
          </tr>
        </thead>

        <tr>
          <?php
            include "const.php"; 

            $consulta = "SELECT * FROM song ORDER BY position ASC";
            $resultado = banco($server, $user, $password, $db, $consulta);

            while ($linha = $resultado->fetch_assoc()){

              echo "<tr>";
              echo "<td>".$linha['name_song']."</td>";
              echo "<td>".$linha['name_singer']."</td>";
              echo "<td>".$linha['name_costumer']."</td>";
              echo "<td>";
              echo "<div class='dropdown'>";
              echo "<button class='btn btn-info dropdown-toggle' data-toggle='dropdown' type='button'>";
              echo "Opções";
              echo "</button>";
              echo "<div class='dropdown-menu'>";
              echo "<a href='remove-song.php?song_id=".$linha['id_song']."' class='dropdown-item'>Remover música</a>";
              echo "<a href='edit-song.php?song_id=".$linha['id_song']."' class='dropdown-item'>Editar música</a>";
              echo "<div class='dropdown-divider'></div>";
              echo "<a href='move-song.php?song_position=".$linha['position']."&func=0' class='dropdown-item'>Mover para cima</a>";
              echo "<a href='move-song.php?song_position=".$linha['position']."&func=1' class='dropdown-item'>Mover para baixo</a>";
              echo "</div>";
              echo "</div>";
              echo "</td>";
            }
          ?>
        </tr>
      </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>