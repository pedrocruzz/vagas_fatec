<?php

use Application\core\Controller;
use Application\models\Admin;
use Application\models\Alunos;
use Application\models\Vagas;

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
  public function empresasPendentes()
  {
    $data = Admin::findAllEmpresasPendentes();
    $this->view('administrador/empresasPendentes', ['empresas' => $data]);
  }
  public function alunosCadastrados()
  {
    $data = Alunos::findAll();
    $this->view('administrador/alunosCadastrados', ['alunos' => $data]);
  }
  public function empresasCadastradas()
  {
    $data = Admin::findAllEmpresas();
    $this->view('administrador/empresasCadastradas', ['empresas' => $data]);
  }
  public function concederParceria()
  {
    $data = Admin::findAllEmpresasSemParceria();
    $this->view('administrador/concederParceria', ['empresas' => $data]);
  }
  public function vagasAtivas()
  {
    $data = Vagas::findAll();
    $this->view('administrador/vagasAtivas', ['vagas' => $data]);
  }
  public function estatisticasGraficos()
  {
    $alunos = Alunos::findAll();
    $empresas = Admin::findAllEmpresas();
    $vagas = Vagas::findAll();
    $this->view('administrador/estatisticasGraficos', ['vagas' => $vagas], ['empresas' => $empresas], ['alunos' => $alunos]);
  }
}