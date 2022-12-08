<?php

use Application\core\Controller;
use Application\models\Admin;
use Application\models\Empresas;

class Empresa extends Controller
{
  public function minhas_vagas()
  {
    $vagaVz = Empresas::findVisualizar($idVaga = null);
    $this->view('empresa/minhas_vagas', ['vagasPreenchidas' => $vagaVz]);
  }

  public function perfil()
  {
    $data = Admin::findAllEmpresas();
    $this->view('empresa/perfil', ['empresas' => $data]);
  }
}
