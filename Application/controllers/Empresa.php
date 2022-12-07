<?php

use Application\core\Controller;
use Application\models\Admin;
use Application\models\Empresas;

class Empresa extends Controller
{
  public function minhas_vagas()
  {
    $this->view('empresa/minhas_vagas');
  }
  public function perfil()
  {
    $data = Admin::findAllEmpresas();
    $this->view('empresa/perfil', ['empresas' => $data]);
  }
}