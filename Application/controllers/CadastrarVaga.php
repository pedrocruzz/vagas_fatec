<?php

use Application\core\Controller;

class CadastrarVaga extends Controller
{
  /*
  * chama a view index.php do  /CadastrarVaga   ou somente   /
  */
  public function index()
  {
    $this->view('cadastrarVaga/index');
  }
}