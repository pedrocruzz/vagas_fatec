<?php

use Application\core\Controller;
use Application\models\Alunos;

class Aluno extends Controller
{
  /**
  * chama a view index.php da seguinte forma /user/index   ou somente   /user
  * e retorna para a view todos os usuários no banco de dados.
  */
  public function index()
  {
        $this->view('Aluno/index');
  }
  public function perfil()
  {
       $data = Alunos::findAll();
        $this->view('aluno/perfil', ['alunos' => $data]);
  }


}