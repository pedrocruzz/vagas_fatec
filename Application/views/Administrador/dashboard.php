<?php

use Application\models\Admin;

if (!isset($_SESSION['adminId'])) {
  header('location: /administrador/login');
  exit();
}
$dadosAluno = Admin::countAlunos();
$dadosEmpresa = Admin::countEmpresas();
$dadosVagas = Admin::countVagas();
$c = 0;
$dadosCandidataçoes = Admin::selecionarCandidataçoes();
foreach ($dadosCandidataçoes as $key => $dado) {
  $c = $dado["candidatos"] + $c;
}
foreach ($dadosEmpresa as $key => $dado) {
  $e = $dado["empresasCadastradas"];
}
foreach ($dadosAluno as $key => $dado) {
  $a = $dado["alunosCadastrados"];
}
foreach ($dadosVagas as $key => $dado) {
  $v = $dado["vagasCadastradas"];
}

$dados = array(
  $e,
  $a,
  $v,
  $c
);

$dadosInativosEmpresa = Admin::countEmpresasRejeitadas();
$dadosExcluidosVagas = Admin::countVagasExcluidas();
$dadosFechadosVagas = Admin::countVagasFechadas();
$dadosInativosVagas = Admin::countVagasRejeitadas();
foreach ($dadosExcluidosVagas as $key => $dado) {
  $vE = $dado["vagasExcluidas"];
}
foreach ($dadosInativosEmpresa as $key => $dado) {
  $eI = $dado["empresasRejeitadas"];
}
foreach ($dadosInativosVagas as $key => $dado) {
  $vI = $dado["vagasRejeitadas"];
}
foreach ($dadosFechadosVagas  as $key => $dado) {
  $vF = $dado["vagasFechadas"];
}
$dadosInativos = array(
  $eI,
  $vI,
  $vE,
  $vF
);

$alunoMaisRecente = Admin::alunoMaisRecente();
$empresaMaisRecente = Admin::empresaMaisRecente();
$vagaMaisRecente = Admin::vagaMaisRecente();
$candidataçaoMaisRecente = Admin::candidataçaoMaisRecente();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script>
  </script>
</head>

<?php include('index.php') ?>
<div class="container" style="padding-left: 200px;">

  <div id="relatorio">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-danger" style="margin-bottom: 20px;">
              <div class="card-header">
                <h3 class="card-title">Cadastros Ativos</h3>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="card card-danger" style="margin-bottom: 20px;">
              <div class="card-header">
                <h3 class="card-title">Cadastros Inativos</h3>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="card m-2">
      <div class="card-header">
        <h1 class="text-muted d-flex justify-content-center">Cadastros Mais Recentes</hq>
      </div>
      <div class="card-body">
        <?php foreach ($alunoMaisRecente as $key => $aluno) { ?>
          <h3 class="p-2">Aluno:</h3>
          <div class="card" style="margin-bottom: 3%;">
            <div class="card-body">
              <div class="row">
                <div class="col text-start">
                  <h5 class="card-title"><?= $aluno['nome'] ?> <nobr class="card-title"><?= $aluno['sobrenome'] ?></nobr>
                  </h5>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <p class="fw-normal"> Curso:
                    <nobr class="text-muted"><?= $aluno['curso'] ?></nobr>
                  </p>
                </div>
                <div class="col">
                  <p class="fw-normal"> RA:
                    <nobr class="text-muted"><?= $aluno['ra'] ?></nobr>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <p class="fw-normal"> Email:
                    <nobr class="text-muted"><?= $aluno['email'] ?></nobr>
                  </p>
                </div>
                <div class="col">
                  <p class="fw-normal"> Telefone:
                    <nobr class="text-muted"><?= $aluno['telefone'] ?></nobr>
                  </p>
                </div>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="../aluno/perfil" method="POST">
                  <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
                  <button class="btn btn-primary m-2" name="verAluno" type="submit">Ver Perfil</button>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php foreach ($empresaMaisRecente as $key => $empresa) { ?>
          <h3 class="p-2">Empresa:</h3>
          <div class="card" style="margin-bottom: 3%;">
            <div class="card-body">
              <div class="row">
                <div class="col text-start">
                  <h5 class="card-title"><?= $empresa['nomeFantasia'] ?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <p class="fw-normal"> CNPJ:
                    <nobr class="text-muted"><?= $empresa['cnpj'] ?></nobr>
                  </p>
                </div>
                <div class="col">
                  <p class="fw-normal"> Email:
                    <nobr class="text-muted"><?= $empresa['email'] ?></nobr>
                  </p>
                </div>
              </div>
              <div class="col">
                <p class="fw-normal"> Descrição:</p>
                <p class="text-muted"><?php if (strlen($empresa['descricao']) > 60) {
                                        echo substr($empresa['descricao'], 0, 60) . '...';
                                      } else {
                                        echo $empresa['descricao'];
                                      } ?></p>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="../empresa/perfil" method="POST">
                  <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                  <button class="btn btn-primary m-2" name="verEmpresa" type="submit">Ver Perfil</button>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php foreach ($vagaMaisRecente as $key => $vaga) { ?>
          <h3 class="p-2">Vaga:</h3>
          <div class="card" style="margin-bottom: 3%;">
            <div class="card-body">
              <div class="row">
                <div class="col text-start">
                  <h5 class="card-title"><?= $vaga['titulo'] ?> </h5>
                  <p class="text-muted">Publicada por <?= $vaga['nome_empresa'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <p class="fw-normal"> Qualificações necessárias:
                  <p class="text-muted"><?php if (strlen($vaga['descricaoQualificacao']) > 100) {
                                          echo substr($vaga['descricaoQualificacao'], 0, 100) . '...';
                                        } else {
                                          echo $vaga['descricaoQualificacao'];
                                        } ?></p>
                  </p>
                </div>
                <div class="col">
                  <p class="fw-normal"> Funções que serão exercidas:
                  <p class="text-muted"><?php if (strlen($vaga['descricaoFuncoes']) > 100) {
                                          echo substr($vaga['descricaoFuncoes'], 0, 100) . '...';
                                        } else {
                                          echo $vaga['descricaoFuncoes'];
                                        } ?></p>
                  </p>
                </div>
                <div class="col">
                  <p class="fw-normal"> Benefícios:
                  <p class="text-muted"><?php if (strlen($vaga['descricaoBeneficios']) > 100) {
                                          echo substr($vaga['descricaoBeneficios'], 0, 100) . '...';
                                        } else {
                                          echo $vaga['descricaoBeneficios'];
                                        } ?></p>
                  </p>
                </div>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="../vaga/index" method="POST">
                  <input type="hidden" name="id" value="<?= $vaga['id'] ?>">
                  <button class="btn btn-primary" name="VerVagaEspecifica" type="submit">Saiba Mais</button>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php foreach ($candidataçaoMaisRecente as $key => $aluno) { ?>
          <h3 class="p-2">Candidatação Em Vaga:</h3>
          <div class="card" style="margin-bottom: 3%;">
            <div class="card-body">
              <div class="row">
                <div class="col text-start">
                  <h5 class="card-title"><?= $aluno['nome'] ?> <nobr class="card-title"><?= $aluno['sobrenome'] ?> se candidatou na vaga de <?= $aluno['titulo'] ?> publicada pela empresa <?= $aluno['nome_empresa'] ?>.</nobr>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Add Content Here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Page specific script -->

<script>
  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
      labels: [
        'Empresas Rejeitadas',
        'Vagas Rejeitadas',
        'Vagas Excluídas',
        'Vagas Fechadas',
      ],
      datasets: [{
        data: <?php echo json_encode($dadosInativos) ?>,
        backgroundColor: ['#0A58CA', '#B02A37', '#6f42c1', '#0F5132'],
      }]
    }
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = {
      labels: [
        'Empresas',
        'Alunos',
        'Vagas',
        'Candidatações em Vagas',
      ],
      datasets: [{
        data: <?php echo json_encode($dados) ?>,
        backgroundColor: ['#0A58CA', '#dc3545', '#6f42c1', '#ae6e72'],
      }]
    }
    var pieOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  })
</script>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>