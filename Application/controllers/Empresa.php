<?php

use Application\core\Controller;
use Application\models\Admin;
use Application\models\Empresas;

class Empresa extends Controller
{
  public function minhas_vagas()
  {
    $data = Empresas::findAll();
    $this->view('empresa/minhas_vagas', ['vagas' => $data]);
  }
  public function perfil()
  {
    $data = Admin::findAllEmpresas();
    $this->view('empresa/perfil', ['empresas' => $data]);
  }
}