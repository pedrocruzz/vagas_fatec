<?php
session_start();

if (isset($_POST["deslogarAluno"])) {
  unset($_SESSION['alunoId']);
  unset($_SESSION['alunoEmail']);
  header('location: /home/index');
}
if (isset($_POST["deslogarEmpresa"])) {
  unset($_SESSION['empresaId']);
  unset($_SESSION['nomeEmpresa']);
  header('location: /home/index');
}
if (isset($_POST["deslogarAdmin"])) {
  unset($_SESSION['adminId']);
  header('location: /home/index');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Fatec Vagas</title>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/global.css">
  <link rel="stylesheet" href="/assets/bootstrap-5.1.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script src="https://kit.fontawesome.com/f8536a8b01.js" crossorigin="anonymous"></script>
  <link rel="icon" href="assets/img/logoFatecIcon.png" type="image/x-icon">
  <link href="assets/css/sidebars.css" rel="stylesheet">
  <script>
    function generatePDF() {
      const element = document.getElementById('relatorio');
      var opt = {
        margin: 10,
        filename: 'relatorio.pdf',
        image: {
          type: 'jpeg',
          quality: 5
        },
        html2canvas: {
          dpi: 192,
          scale: 4,
          letterRendering: true,
          useCORS: true
        },
        jsPDF: {
          unit: 'mm',
          format: 'a4',
          orientation: 'landscape'
        }
      };
      // Choose the element that our invoice is rendered in.
      html2pdf().set(opt).from(element).save();
    }
  </script>
</head>

<body>
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap" />
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <a class="navbar-brand link-dark" href="/home/index">FATEC VAGAS</a>
          <li><a href="/vaga/index" class="nav-link px-2 link-dark">Vagas</a></li>
          <li><a href="/home/faq" class="nav-link px-2 link-dark">FAQ</a></li>
          <li><a href="/home/sobre" class="nav-link px-2 link-dark">Sobre</a></li>
        </ul>
        <?php
        if (isset($_SESSION) &&  isset($_SESSION['alunoId'])  && $_SESSION['alunoId'] != 0) {
          echo '<div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-graduation-cap rounded-circle" style="background-color: #6C757D1A;padding: 0.7rem;"></i></a>
                      <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                      <li><a class="dropdown-item" href="../aluno/perfil">Perfil</a></li>
                      <li><a class="dropdown-item" href="../aluno/index">Adicionar informa????es</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <form method="post">
                      <li><button class="dropdown-item" type="submit" name="deslogarAluno">Sair</button></li>
                      </form>
                      </ul>
                      </div>';
        } else if (isset($_SESSION) &&  isset($_SESSION['empresaId']) && $_SESSION['empresaId'] != 0) {
          echo '<div class="dropdown text-end">
                       <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-building rounded-circle" style="background-color: #6C757D1A;padding: 0.7rem;"></i></a>
                       <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                       <li><a class="dropdown-item" href="../empresa/perfil">Perfil</a></li>
                       <li><a class="dropdown-item" href="../empresa/minhas_vagas" id="podeVer">Minhas Vagas</a></li>
                       <li>
                         <hr class="dropdown-divider">
                       </li>
                       <form method="post">
                       <li><button class="dropdown-item" type="submit" name="deslogarEmpresa">Sair</button></li>
                       </form>
                       </ul>
                       </div>';
        } else if (isset($_SESSION) && isset($_SESSION['adminId'])  && $_SESSION['adminId'] != 0) {
          echo '<div class="dropdown text-end">
                       <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user rounded-circle" style="background-color: #6C757D1A;padding: 0.7rem;"></i></a>
                       <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                       <li><a class="dropdown-item" type="button" style="display:none;visibility:hidden;" id="gerarRelatorio" onclick=" generatePDF()">Gerar relat??rio</a></li>
                       <li><a class="dropdown-item" href="../administrador/dashboard" type="button" style="display:block;visibility:visible;" id="verDashboard">Dashboard</a></li>
                       <li>
                       <hr class="dropdown-divider">
                     </li>
                       <form method="post">
                       <li><button class="dropdown-item" type="submit" name="deslogarAdmin">Sair</button></li>
                       </form>
                       </ul>
                       </div>';
        } else {
          echo '<div class="dropdown text-end border-end border-secondary" style="padding-right: 2rem;">
                      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">Cadastro</a>
                      <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="/home/cadastro_aluno">Aluno</a></li>
                        <li><a class="dropdown-item" href="/home/cadastro_empresa">Empresa</a></li>
                      </ul>
                    </div>
                    <div class="dropdown text-end" style="padding-left: 2rem;">
                      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                      <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="/login/aluno">Aluno</a></li>
                        <li><a class="dropdown-item" href="/login/empresa">Empresa</a></li>
                      </ul>
                    </div>';
        }
        ?>
      </div>
    </div>
  </header>

  <?php
  require '../Application/autoload.php';

  use Application\core\App;
  use Application\core\Controller;

  $app = new App();

  ?>

  <div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Vagas</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Empresas</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Sobre</a></li>
      </ul>
      <p class="text-center text-muted">&copy; 2022, Fatec Vagas</p>
    </footer>
  </div>
  <script src="/assets/js/jquery.slim.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/sidebars.js"></script>
  <script src="/assets/js/script.js"></script>
</body>

</html>