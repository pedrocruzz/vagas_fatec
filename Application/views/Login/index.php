<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Sistema de Gerenciamento Hospitalar</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  </head>
  <body style="background:#f3f3f3">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
          <div style="margin-top:8%">
            <div class="text-center" style="margin-bottom:20px">
              <img class="img-fluid" width="300" src="/assets/img/logo.png">
            </div>
            <?
              require 'include/page/erro.php';
            ?>
            <form method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="senha" class="form-control" placeholder="Password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn-block btn btn-primary" name="submitLogin">Acessar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>