<?php

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
    <script type="text/javascript" src="assets/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="assets/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
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
          
          <h1 class="lead">Registro</h1>
        </div>       

          <label>Nombres</label>
          <input type="text" id="nombre" class="form-control" autocomplete="off" required="">
          <label>Apellidos</label>
          <input type="text" id="apellido" class="form-control" autocomplete="off" required="">
          <label>Email</label>
          <input type="email" id="email" class="form-control" autocomplete="off" required="">
          <label>Usuario</label>
          <input type="text" id="usuario" class="form-control" autocomplete="off" required="">
          <label>Clave</label>
          <input type="password" id="clave" class="form-control" autocomplete="off" required="">
          <label>Repetir Clave</label>
          <input type="password" id="clave2" class="form-control" autocomplete="off" required=""><br>
          <button id="iniciar" class="form-control"  onclick="registro();">Registrarme</button>
          <div id="response"></div>
        <small>Ya tengo una cuenta <a href="login.php">Iniciar Sesión</a></small>

      </div>
      
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>