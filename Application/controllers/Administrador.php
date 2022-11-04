<?php

use Application\core\Controller;
use Application\models\Admin;

class Administrador extends Controller
{
  public function index()
  {
    $this->view('administrador/index');
  }
  public function vagas_pendentes()
  {
    $data = Admin::findAllVagasPendentes();
    $this->view('administrador/vagas_pendentes', ['vagas' => $data]);
  }
}