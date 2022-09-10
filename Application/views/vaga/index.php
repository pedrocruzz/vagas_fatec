<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/global.css">
  <link rel="stylesheet" href="../public/bootstrap-5.1.3-dist/css/bootstrap.min.css">
  <title>Document</title>
  <link href="../public/css/sidebars.css" rel="stylesheet">
</head>

<body>
  <div class="container">
  <div class="d-flex justify-content-center">
    <div class="container">
      <div class="row">
        <div class="col-8">
          <div class="bg-light rounded-3">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">Custom jumbotron</h1>
              <p class="col-md-8 fs-4">Using a  series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
              <button class="btn btn-primary btn-lg" type="button">Example button</button>
            </div>
          </div>
        </div>
        <div class="col-4">
        <main>
            <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
              <div class="list-group list-group-flush border-bottom scrollarea">
                <?php foreach ($data['vagas'] as $vaga) { ?>
                  <form method='get' name="letter" >
                  <input type='submit' class="list-group-item list-group-item-action  py-3 lh-tight" name="getVaga" aria-current="true" value="<?= $vaga['id'] ?>">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                      <strong class="mb-1"><?= $vaga['titulo'] ?></strong>
                      <small><?= $vaga['empresa'] ?></small>
                    </div>
                    <div class="col-10 mb-1 small"><?= $vaga['descricao'] ?></div>
                </>
                  <?php }?>
              </div>
            </div>
          </main>
          <?php
              if(isset($_GET['getVaga'])){
              $selected_val = $_GET['getVaga'];
              }
              echo $selected_val;
          ?>
        </div>
      </div>
    </div>
  </div>
  <script src="../public/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
  <script src="../public/js/sidebars.js"></script>
</body>

</html>