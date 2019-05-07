<?php
    session_start();
    if (isset($_SESSION['uUSER'])) {
      header("Location: ./index.php");
    }

  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style type="text/css">
      .login{
        width: 100%;
      }
      .formulario{
        padding: 20px;
      }
      .formulario .titulo{
        display: flex;
        justify-content: center;
      }

    </style>

  </head>
  <body>

    <div class="login col-md-4 col-sm-12 m-auto">

      <div class="formulario">
         <img width="100px" height="100px" src="logo.png" class="d-block m-auto ">
        <div class="titulo">
          <h1 class="lead">Adivina Adivinador</h1>
        </div>       

        <form action="./config/loginConfig.php" method="POST" autocomplete="off">
          <label>Usuario</label>
          <input type="text" name="usuario" class="form-control">
          <label>Clave</label>
          <input type="password" name="clave" class="form-control"><br>
          <input type="submit" name="iniciar" class="form-control" value="Iniciar">
        </form>

        <small>Registrarme <a href="registro.php">AQUI</a></small>

      </div>
      
    </div>
    <?php if (isset($_GET['e'])): ?>
      <script type="text/javascript">
        Swal.fire({
          type: 'error',
          title: 'Oops...',
          text: 'EL usuario y/o contraseña son incorrectos. Intente de nuevo.',
          footer: 'No estoy regristado. <a href="registro.php">Quiero Registrarme.</a>'
        });
      </script>      
    <?php endif; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>