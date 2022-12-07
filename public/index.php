<?php
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
  <link rel="icon" href="assets/img/logoFatecIcon.png" type="image/x-icon">
  <link href="assets/css/sidebars.css" rel="stylesheet">
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
        if (isset($_SESSION['alunoId'])) {
          echo '<div class="dropdown text-end border-end border-secondary" style="padding-right: 2rem;">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">Cadastro</a>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">Perfil</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Sair</a></li>
              </ul>
              </div>';
        } else if (isset($_SESSION['empresaId'])) {
          echo '<div class="dropdown text-end border-end border-secondary" style="padding-right: 2rem;">
               <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">Cadastro</a>
               <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
               <li><a class="dropdown-item" href="#">Perfil</a></li>
               <li>
                 <hr class="dropdown-divider">
               </li>
               <li><a class="dropdown-item" href="#">Sair</a></li>
               </ul>
               </div>';
        } else if (isset($_SESSION['adminId'])) {
          echo '<div class="dropdown text-end border-end border-secondary" style="padding-right: 2rem;">
               <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">Cadastro</a>
               <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
               <li><a class="dropdown-item" href="#">Perfil</a></li>
               <li>
                 <hr class="dropdown-divider">
               </li>
               <li><a class="dropdown-item" href="#">Sair</a></li>
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