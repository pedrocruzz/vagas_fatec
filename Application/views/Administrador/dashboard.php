<?php
use Application\models\Admin;
$dadosAluno = Admin::countAlunos();
$dadosEmpresa = Admin::countEmpresas();
$dadosVagas = Admin::countVagas();
foreach($dadosEmpresa as $key => $dado){
  $e = $dado["empresasCadastradas"];
}
foreach($dadosAluno as $key => $dado){
  $a = $dado["alunosCadastrados"];
}
foreach($dadosVagas as $key => $dado){
  $v = $dado["vagasCadastradas"];
}
$dados = array(
  $e,
  $a,
  $v
);

$dadosInativosEmpresa = Admin::countEmpresasRejeitadas();
$dadosExcluidosVagas = Admin::countVagasExcluidas();
$dadosFechadosVagas = Admin::countVagasFechadas();
$dadosInativosVagas = Admin::countVagasRejeitadas();
foreach($dadosExcluidosVagas as $key => $dado){
  $vE = $dado["vagasExcluidas"];
}
foreach($dadosInativosEmpresa as $key => $dado){
  $eI = $dado["empresasRejeitadas"];
}
foreach($dadosInativosVagas as $key => $dado){
  $vI = $dado["vagasRejeitadas"];
}
foreach($dadosFechadosVagas  as $key => $dado){
  $vF = $dado["vagasFechadas"];
}
$dadosInativos = array(
  $eI,
  $vI,
  $vE,
  $vF
);

$dadosCandidatos = array (
  Admin::countCandidatosEmVagas()
);

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
    function relatorio(){
      document.getElementById("itemEscondido").style.visibility = "visible";
      document.getElementById("itemEscondido").style.display = "block";
    }
  </script>
</head>

<body onload="relatorio();">
  <?php include('index.php') ?>
  <div class="container" style="padding-left: 200px;">
    <section class="content" id="relatorio">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
                        <!-- PIE CHART -->
                        <div class="card card-danger"  style="margin-bottom: 20px;">
              <div class="card-header">
                <h3 class="card-title">Cadastros Ativos</h3>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info" style="margin-bottom: 20px;">
              <div class="card-header">
                <h3 class="card-title">Cadastros em Vagas</h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- BAR CHART -->
            <div class="card card-success" style="margin-bottom: 20px;">
              <div class="card-header">
                <h3 class="card-title">Cadastros por mês</h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
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
      //- LINE CHART -
      //--------------
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChartData = {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        datasets: [{
            label: 'Alunos',
            backgroundColor: '#dc3545',
            borderColor: '#dc3545',
            pointRadius: false,
            pointColor: '#dc3545',
            pointStrokeColor: '#dc3545',
            pointHighlightFill: '#fff',
            pointHighlightStroke: '#dc3545',
            data: <?php echo json_encode($dadosCandidatos) ?>
          },
          {
            label: 'Ignorar',
            backgroundColor: 'white',
            borderColor: 'white',
            pointRadius: false,
            pointColor: 'white',
            pointStrokeColor: 'white',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'white',
            data: [0, 0, 0, 0, 0, 0, 0]
          },
        ]
      }

      var lineChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }
      lineChartData.datasets[0].fill = false;
      lineChartData.datasets[1].fill = false;
      lineChartOptions.datasetFill = false

      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
      })

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
          backgroundColor: ['#0A58CA','#B02A37', '#6f42c1','#0F5132'],
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
        ],
        datasets: [{
          data: <?php echo json_encode($dados) ?>,
          backgroundColor: ['#0A58CA', '#dc3545', '#6f42c1'],
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

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        datasets: [{
            label: 'Alunos',
            backgroundColor: 'rgba(250, 70, 40, 200)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [25, 22, 98, 38, 67, 67, 45, 53, 62, 74, 85, 93]
          },
          {
            label: 'Empresas',
            backgroundColor: 'rgba(20, 200, 250, 1)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [28, 48, 40, 19, 86, 27, 90, 15, 27, 36, 47, 58]
          },
          {
            label: 'Vagas',
            backgroundColor: 'rgba(140, 50, 100, 50)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [45, 23, 57, 83, 37, 34, 40, 31, 44, 53,65, 76]
          },
        ]
      }

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
    })
  </script>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>