<?php

use Application\core\Controller;
use Application\models\LoginAluno;

class Login extends Controller
{
  /**
   * chama a view index.php da seguinte forma /user/index   ou somente   /user
   * e retorna para a view todos os usuários no banco de dados.
   */
  public function index()
  {
    $user = LoginAluno::login();
    $this->view('login/index', ['login' => $user]);
  }
}
