<?php

use Application\core\Controller;

class Usuario extends Controller
{
  /**
  * chama a view index.php da seguinte forma /user/index   ou somente   /user
  * e retorna para a view todos os usuários no banco de dados.
  */
  public function index()
  {
        $this->view('Usuario/index');
  }

 


}