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
  public function cadastro()
  {
    $this->view('home/cadastro');
  }

  public function cadastrarAluno(){
    $servername = "localhost:8080";
    $username = "root";
    $password = " ";
    $dbname = "vagas_fatec";
    $conn = new mysqli($servername,
    $username, $password, $dbname);

    if(isset($_POST['submit'])){
      $nome = $_REQUEST['nome'];
      $sobrenome = $_REQUEST['sobrenome'];
      $dataNascimento = $_REQUEST['dataNascimento'];
      $cpf = $_REQUEST['cpf'];
      $telefone = $_REQUEST['telefone'];
      $email = $_REQUEST['email'];
      $ra = $_REQUEST['ra'];
      $cep = $_REQUEST['cep'];
      $cidade = $_REQUEST['cidade'];
      $endereco = $_REQUEST['endereco'];
      $curso = $_REQUEST['curso'];
      $periodo = $_REQUEST['periodo'];
      $areaInteresse = $_REQUEST['areaInteresse'];
      $curriculo = $_REQUEST['curriculo'];
      $senha = $_REQUEST['senha'];
      $senhaConfirmada = $_REQUEST['senhaConfirmada'];
      if($senha == $senhaConfirmada){
        $senhaOficial = $senhaConfirmada;
      }
      $sql = "INSERT INTO 'vagas_Fatec'.'aluno' (nome, sobrenome, dataNascimento, cpf, telefone, email, ra, cep, cidade, endereco, curso, periodo, areaInteresse, curriculo, senha)
      VALUES ('$nome', '$sobrenome', '$dataNascimento', '$cpf', '$telefone', '$email', '$ra', '$cep', '$cidade', '$endereco', '$curso', '$periodo', '$areaInteresse', '$curriculo', '$senhaOficial')";
      
      if(mysqli_query($conn, $sql)){  
        header("Location:http://localhost:8080/home/index");
        exit();
      }
    }
  }

  public function cadastrarEmpresa(){
    $servername = "localhost:8080";
    $username = "root";
    $password = " ";
    $dbname = "vagas_fatec";
    $conn = new mysqli($servername,
    $username, $password, $dbname);

    if(isset($_POST['submit'])){
      $razaoSocial = $_REQUEST['razaoSocial'];
      $nomeFantasia = $_REQUEST['nomeFantasia'];
      $cnpj = $_REQUEST['cnpj'];
      $telefone = $_REQUEST['telefone'];
      $email = $_REQUEST['email'];
      $nomeResponsavel = $_REQUEST['nomeResponsavel'];
      $cep = $_REQUEST['cep'];
      $cidade = $_REQUEST['cidade'];
      $endereco = $_REQUEST['endereco'];
      $site = $_REQUEST['site'];
      $areaAtuacao = $_REQUEST['areaAtuacao'];
      $descricao = $_REQUEST['descricao'];
      $senha = $_REQUEST['senha'];
      $senhaConfirmada = $_REQUEST['senhaConfirmada'];
      if($senha == $senhaConfirmada){
        $senhaOficial = $senhaConfirmada;
      }
      $sql = "INSERT INTO Empresa (razaoSocial, nomeFantasia, cnpj, telefone, email, nomeResponsavel, cep, cidade, endereco, website, areaAtuacao, descricao, senha)
      VALUES ('$razaoSocial', '$nomeFantasia', '$cnpj', '$telefone', '$email', '$nomeResponsavel' '$cep', '$cidade', '$endereco', '$site', '$areaAtuacao', '$descricao', '$senhaOficial')";
      
      if(mysqli_query($conn, $sql)){  
        header("Location:http://localhost:8080/home/index");
        exit();
      }
    }
  }
}