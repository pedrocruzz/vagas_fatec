<?php

use Application\core\Controller;
use Application\models\Vagas;

class Home extends Controller
{
  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {
    $data = Vagas::findAll();
    $this->view('home/index', ['vagas' => $data]);
  }
  public function sobre()
  {
    $this->view('home/sobre');
  }
  public function faq()
  {
    $this->view('home/faq');
  }
  public function empresasCadastradas()
  {
    $this->view('home/empresasCadastradas');
  }

  public function cadastro_aluno()
  {
    $this->view('home/cadastro_aluno');
  }
  public function cadastro_empresa()
  {
    $this->view('home/cadastro_empresa');
  }
}
