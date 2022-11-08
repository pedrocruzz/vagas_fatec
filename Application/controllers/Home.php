<?php

use Application\core\Controller;

class Home extends Controller
{
  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {
    $this->view('home/index');
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
<<<<<<< HEAD

  public function empresasCadastradas()
  {
    $this->view('home/empresasCadastradas');
  }
}







}

=======
  public function cadastro_aluno()
  {
    $this->view('home/cadastro_aluno');
  }
  public function cadastro_empresa()
  {
    $this->view('home/cadastro_empresa');
  }
}
>>>>>>> fec1ceaa8fa386a5311e676cb4081f56b4b3672e
