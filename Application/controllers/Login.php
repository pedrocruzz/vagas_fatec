<?php

use Application\core\Controller;
use Application\models\LoginAluno;
use Application\models\LoginEmpresa;

class Login extends Controller
{
  /**
   * chama a view index.php da seguinte forma /user/index   ou somente   /user
   * e retorna para a view todos os usuários no banco de dados.
   */
  public function aluno()
  {
    $user = LoginAluno::login();
    $this->view('login/aluno', ['login' => $user]);
  }
  public function empresa()
  {
    $user = LoginEmpresa::login();
    $this->view('login/empresa', ['login' => $user]);
  }
}
