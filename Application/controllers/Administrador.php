<?php

use Application\core\Controller;
use Application\models\Admin;
use Application\models\Alunos;
use Application\models\Vagas;
use Application\models\LoginAdmin;

class Administrador extends Controller
{
  public function vagasPendentes()
  {
    $data = Admin::findAllVagasPendentes();
    $this->view('administrador/vagasPendentes', ['vagas' => $data]);
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
  public function dashboard()
  {
    $this->view('administrador/dashboard');
  }
  public function vagasFechadas(){
    $data = Vagas::findAllVagasFechadas();
    $this->view('administrador/vagasFechadas', ['vagas' => $data]);
  }
  public function Login(){
    $user = LoginAdmin::login();
    $this->view('administrador/login', ['login' => $user]);
  }
}