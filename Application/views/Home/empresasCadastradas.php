<?php

use Application\models\Empresas;

$dataC = Empresas::findAllEmpresasPorAreaComercio();
$dataS = Empresas::findAllEmpresasPorAreaServicos();
$dataI = Empresas::findAllEmpresasPorAreaIndustria();
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
  <title>Empresas Cadastradas</title>
  <script src="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://kit.fontawesome.com/f8536a8b01.js" crossorigin="anonymous"></script>
  <link href="css/empres.css" rel="stylesheet" type="text/css">

  <style>
    .card-body {
      padding: 1rem;
    }

    .card {
      margin: 0;
    }
  </style>
</head>

<body>

  <div class="container">
    <h3 class="ps-5">Área de Indústria</h3>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="card-group ps-5">
          <?php $i = 1; ?>
          <?php foreach (array_chunk($dataI, 4) as $group) { ?>
            <div class="carousel-item  <?php if ($i == 1) {
                                          echo 'active';
                                        } ?> m-0">
              <div class="row">
                <?php foreach ($group as $empresa) { ?>
                  <div class="col">
                    <div class="card" style="width: 18rem; height: 26rem;">
                      <div class="card-body">
                        <h3 class="card-title"><?= $empresa['nomeFantasia'] ?> <?php if ($empresa['parceria'] == 1) { ?>
                            <i class="fa-solid fa-medal" data-bs-toggle="tooltip" title="Selo de parceria" style="color:#dc3545;"></i>
                          <?php } ?>
                        </h3>
                        <div class="card-text">
                          <div class="row">
                            <div class="col border-bottom pb-2 pt-3">
                              <p class="text-muted"><?= $empresa['endereco'] ?> <?= $empresa['cidade'] ?></p>
                              </p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col pb-2 pt-3">
                              <p class="text-muted">Tel: <?= $empresa['telefone'] ?> </p>
                              <p class="text-muted">Site: <?= $empresa['website'] ?> </p>
                              <p class="text-muted">Email: <?= $empresa['email'] ?> </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <form action="../empresa/perfil" method="POST">
                          <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                          <button class="btn btn-primary m-2" name="verEmpresa" type="submit">Ver Perfil</button>
                        </form>
                      </div>
                    </div>
                    <?php $i++; ?>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <hr>
    <h3 class="ps-5">Área de Comércio</h3>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="card-group ps-5">
          <?php $i = 1; ?>
          <?php foreach (array_chunk($dataC, 4) as $group) { ?>
            <div class="carousel-item  <?php if ($i == 1) {
                                          echo 'active';
                                        } ?> m-0">
              <div class="row">
                <?php foreach ($group as $empresa) { ?>
                  <div class="col">
                    <div class="card" style="width: 18rem; height: 26rem;">
                      <div class="card-body">
                        <h3 class="card-title"><?= $empresa['nomeFantasia'] ?> <?php if ($empresa['parceria'] == 1) { ?>
                            <i class="fa-solid fa-medal" data-bs-toggle="tooltip" title="Selo de parceria" style="color:#dc3545;"></i>
                          <?php } ?>
                        </h3>
                        <div class="card-text">
                          <div class="row">
                            <div class="col border-bottom pb-2 pt-3">
                              <p class="text-muted"><?= $empresa['endereco'] ?> <?= $empresa['cidade'] ?></p>
                              </p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col pb-2 pt-3">
                              <p class="text-muted">Tel: <?= $empresa['telefone'] ?> </p>
                              <p class="text-muted">Site: <?= $empresa['website'] ?> </p>
                              <p class="text-muted">Email: <?= $empresa['email'] ?> </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <form action="../empresa/perfil" method="POST">
                          <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                          <button class="btn btn-primary m-2" name="verEmpresa" type="submit">Ver Perfil</button>
                        </form>
                      </div>
                    </div>
                    <?php $i++; ?>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <hr>
    <h3 class="ps-5">Área de Serviços</h3>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="card-group ps-5">
          <?php $i = 1; ?>
          <?php foreach (array_chunk($dataS, 4) as $group) { ?>
            <div class="carousel-item  <?php if ($i == 1) {
                                          echo 'active';
                                        } ?>">
              <div class="row">
                <?php foreach ($group as $empresa) { ?>
                  <div class="col">
                    <div class="card" style="width: 18rem; height: 26rem;">
                      <div class="card-body">
                        <h3 class="card-title"><?= $empresa['nomeFantasia'] ?> <?php if ($empresa['parceria'] == 1) { ?>
                            <i class="fa-solid fa-medal" data-bs-toggle="tooltip" title="Selo de parceria" style="color:#dc3545;"></i>
                          <?php } ?>
                        </h3>
                        <div class="card-text">
                          <div class="row">
                            <div class="col border-bottom pb-2 pt-3">
                              <p class="text-muted"><?= $empresa['endereco'] ?> <?= $empresa['cidade'] ?></p>
                              </p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col pb-2 pt-3">
                              <p class="text-muted">Tel: <?= $empresa['telefone'] ?> </p>
                              <p class="text-muted">Site: <?= $empresa['website'] ?> </p>
                              <p class="text-muted">Email: <?= $empresa['email'] ?> </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <form action="../empresa/perfil" method="POST">
                          <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                          <button class="btn btn-primary m-2" name="verEmpresa" type="submit">Ver Perfil</button>
                        </form>
                      </div>
                    </div>
                    <?php $i++; ?>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>


</body>